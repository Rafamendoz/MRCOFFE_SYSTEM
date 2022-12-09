<?php 


class DetallePedido{


    public $idpedido;
    public $idproducto;
    public $cantidad;
    public $descuento;
    public $subtotal;   
    public $idEmpleado;
 



    function Constructor($idpedido,$idproducto,$cantidad,$descuento, $subtotal){
        $this->idpedido=$idpedido;
        $this->idproducto=$idproducto;
        $this->cantidad=$cantidad;
        $this->descuento=$descuento;
        $this->subtotal=$subtotal;
    

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
      

}

?>