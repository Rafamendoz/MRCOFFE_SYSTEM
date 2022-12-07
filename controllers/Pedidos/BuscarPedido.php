<?php

include(".../conexion.php");
include(".../php/Pedidos/pedidos.php");



$idpedidoactual = @$_POST["idpedido"];

$pedidoactual = new Pedido();

echo json_encode($pedidoactual->BuscarPedido($idpedidoactual, $mysqli));





?>