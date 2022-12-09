<?php 


class DetallePedido{


    public $idpedido;
    public $idproducto;
    public $cantidad;
    public $descuento;
    public $subtotal;   
    public $idEmpleado;
    public $total;
 



    function Constructor($idpedido,$idproducto,$cantidad,$descuento, $subtotal, $total){
        $this->idpedido=$idpedido;
        $this->idproducto=$idproducto;
        $this->cantidad=$cantidad;
        $this->descuento=$descuento;
        $this->subtotal=$subtotal;
        $this->total = $total;
    

    }
    function SetUser($user){
        $this->idEmpleado=$user;

   

    }
   

    

    function BuscardetallesP($conexion){
        $query = "SELECT dp.idpedido, p.nombreproducto, dp.cantidad, dp.descuento,dp.isv,dp.subtotal, dp.total FROM detallepedido as dp INNER JOIN producto p on p.idproducto = dp.idproducto";
        $listadetalle = array();
        $result = mysqli_query($conexion, $query);
        while ($row = mysqli_fetch_array($result)){
            $detalle = new DetallePedido();
            $detalle->Constructor($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
            $listadetalle[] = $detalle;

        }
        return $listadetalle;
    }


    function ObtenerEmpleadoById($idemp,$Conexion){

        $query = "SELECT e.nombre from usuarios as u INNER JOIN empleados e on e.idusuarios = u.idusuarios WHERE idusuarios="."'".$idemp."'";
        $result = mysqli_query($Conexion, $query);
        $Dempleado = new DetallePedido();
    
            while ($row = mysqli_fetch_array($result))
            {
              
                $Dempleado->SetUser($idemp);
          
            
            }
        
          
        
        return $Dempleado;
      }


      function GuardarDetalle($conexion){
        $respuesta = "eeee";
        $query = "INSERT INTO detallepedido (idpedido, idproducto, cantidad, descuento, subtotal, total)".
        "values($this->idpedido,$this->idproducto,$this->cantidad,$this->descuento,$this->subtotal,$this->total)";
    
       
        if(mysqli_query($conexion,$query)==true){
            
            $respuesta="Exito";

        }else{
            $respuesta="Error";
        }

        return $respuesta;
  
    }
      

}

?>