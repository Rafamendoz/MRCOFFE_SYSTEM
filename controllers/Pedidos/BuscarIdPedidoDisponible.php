<?php
include("../../conexion.php");
include("../../php/Pedidos/pedidos.php");

$idpedidoactual = new Pedido();
echo json_encode($idpedidoactual->ObtenerIdPedido($mysqli));

?>