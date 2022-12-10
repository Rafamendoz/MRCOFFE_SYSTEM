<?php

include('../../php/Factura.php');
include("../../conexion.php");


$fecha=@$_POST["idfecha"];
$idpedido = @$_POST["idpedido"];
$total = @$_POST["totalp"];
$isv =  @$_POST["isv"];
$subtotal = @$_POST["subtotal"];
$facturanew = new Factura();
$facturanew->ConstructorFactura($idpedido,$subtotal, $isv, $fecha, $total, 1) ;
echo $facturanew->GuardarFactura($mysqli);











?>