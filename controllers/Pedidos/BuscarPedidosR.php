<?php

include("../../conexion.php");
include("../../php/Pedidos/pedidor.php");



$pedidoactual = new PedidoRealizado();

echo json_encode($pedidoactual->BuscarPedidosH($mysqli));





?>