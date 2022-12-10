<?php 


class PedidoAnulado{


    public $idpedido;
    public $idcliente;
    public $nombrecliente;
    public $idempleado;
    public $nombreempleado;
    public $total;



    function Constructor($idpedido, $idcliente, $nombrecliente, $idempleado, $nombreempleado, $total){
        $this->idpedido=$idpedido;
        $this->idcliente=$idcliente;
        $this->nombrecliente=$nombrecliente;
        $this->idempleado=$idempleado;
        $this->nombreempleado=$nombreempleado;
        $this->total=$total;
    }

   

    function BuscarPedidoPorIdA($idpedido, $conexion){
        $query = "SELECT * FROM pedido WHERE idpedido='".$idpedido."' AND idEstadoPedido=1";
        $result = mysqli_query($conexion, $query);
     

        while($row = mysqli_fetch_array($result))
        {
            $pedido = new PedidoAnulado($row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
        }

        return $pedido;

    }

    function BuscarPedidosA($conexion){
        $query = "SELECT p.idpedido, c.idcliente,concat(c.nombre,' ' ,c.apellido), p.idempleados,  u.nombre, p.Total FROM pedido as p 
        INNER JOIN cliente c on c.idcliente = p.idcliente 
        INNER JOIN usuarios u on u.idusuarios = p.idempleados 
        WHERE idEstadoPedido=2;";
        $listPedido = array();
        $result = mysqli_query($conexion, $query);
        while ($row = mysqli_fetch_array($result)){
            $pedido = new PedidoAnulado();
            $pedido->Constructor($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
            $listPedido[] = $pedido;

        }
        return $listPedido;
    }

}
?>