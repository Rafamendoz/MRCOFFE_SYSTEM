<?php

include("../../conexion.php");
include("../../php/DetallePedido/DetallePedido.php");



$detalle = new DetallePedido();

echo json_encode($detalle->BuscardetallesP($mysqli));





?>