<?php

include('../../php/Factura.php');
include("../../conexion.php");


$fecha=@$_POST["idfecha"];
$idpedido = @$_POST["idpedido"];
$total = @$_POST["totalp"];
$facturanew = new Factura();
$facturanew->ConstructorFactura($idpedido, $fecha, $total, 1) ;
echo $facturanew->GuardarFactura($mysqli);











?>