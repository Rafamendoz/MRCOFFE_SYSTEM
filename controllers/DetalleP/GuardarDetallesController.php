<?php
include('../../conexion.php');
include('../../php/DetallePedido/DetallePedido.php');

$idpedido = @$_POST["idpedido"];
$idproducto = @$_POST["idproducto"];
$cantidad = @$_POST["cantidad"];
$descuento = @$_POST["descuento"];
$subtotal = @$_POST["subtotal"];
$total = @$_POST["total"];

$detallepedidoactual = new DetallePedido();
$detallepedidoactual->Constructor($idpedido, $idproducto, $cantidad, $descuento, $subtotal, $total);
echo json_encode($detallepedidoactual->GuardarDetalle($mysqli));




?>