<?php

include("../../conexion.php");
include("../../php/DetallePedido/DetallePedido.php");

$idpedidos = @$_POST["idpedido"];

$detalle = new DetallePedido();

echo json_encode($detalle->BuscardetallesP($mysqli, $idpedidos));