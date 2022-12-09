<?php
include("../../conexion.php");
include("../../php/DetallePedido/DetallePedido.php");

$detalle = new DetallePedido();
$iduser = @$_POST["idpedido"];
echo json_encode($detalle->ObtenerDetalleById($iduser, $mysqli));