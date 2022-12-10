<?php 

include("respuestapedidos.php");

class Pedido{


    public $idpedido;
    public $idempleado;
    public $fechapedido;
    public $horapedido;
    public $idcliente;
    public $idtipopago;
    public $nombrecliente;
    public $total;



    function Constructor($idpedido, $idempleado, $fechapedido, $horapedido, $idcliente, $idtipopago, $nombrecliente, $total){
        $this->idpedido=$idpedido;
        $this->idempleado=$idempleado;
        $this->fechapedido=$fechapedido;
        $this->horapedido=$horapedido;
        $this->idcliente=$idcliente;
        $this->idtipopago=$idtipopago;
        $this->nombrecliente=$nombrecliente;
        $this->total=$total;
    }

   

    function BuscarPedidoPorIdH($idpedido, $conexion){
        $query = "SELECT * FROM pedido WHERE idpedido='".$idpedido."' AND idEstadoPedido=1";
        $result = mysqli_query($conexion, $query);
     

        while($row = mysqli_fetch_array($result))
        {
            $pedido = new Pedido($row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
        }

        return $pedido;

    }

    function BuscarPedidosH($conexion){
        $query = "SELECT p.idpedido, concat(c.nombre,c.apellido), concat(e.nombre,e.apellido), p.Total FROM pedido as p INNER JOIN cliente c on c.idcliente = p.idcliente INNER JOIN empleados e on e.idempleados = p.idempleados";
        $listPedido = array();
        $result = mysqli_query($conexion, $query);
        while ($row = mysqli_fetch_array($result)){
            $pedido = new Pedido();
            $pedido->Constructor($row[0], $row[1], $row[2], $row[3], null, null);
            $listPedido[] = $pedido;

        }
        return $listPedido;
    }

    function GuardarPedido($conexion){
        $respuesta = new RespuestaPedido();
    
        $query = "INSERT INTO pedido (idpedido, idempleados, fechapedido, horapedido, idcliente, idTipoPago, idEstadoPedido, Total) values($this->idpedido,$this->idempleado,'$this->fechapedido','$this->horapedido',$this->idcliente,$this->idtipopago,1, $this->total)";
    
       
        if(mysqli_query($conexion,$query)==true){
            
            $respuesta->Succes("Exito");

        }else{
            $respuesta->NoSucces("Fallo");
        }

        return $respuesta;
  
    }

    function ObtenerIdPedido($conexion){
        $query = "SELECT MAX(idpedido) FROM pedido;"; 
        $resultado = mysqli_query($conexion, $query);
        while($row = mysqli_fetch_array($resultado)){
            $idpedidon = $row[0]+1;

        }
        return $idpedidon;

    }

   

}














?>