<?php

include("../../conexion.php");
include("../../php/Pedidos/pedidosa.php");



$pedidoactual = new PedidoAnulado();

echo json_encode($pedidoactual->BuscarPedidosA($mysqli));





?>