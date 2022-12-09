<?php

include('../../php/Pedidos/pedidos.php');
include("../../conexion.php");

$ccliente=@$_POST["IdCliente"];
$fecha=@$_POST["idfecha"];
$idpedido = @$_POST["idpedido"];
$nombreC = @$_POST["NombreCliente"];
$horaa = @$_POST["NombreCliente"];
$pedidoanew = new Pedido();
$pedidoanew->Constructor($idpedido, 1, $fecha, $horaa , $ccliente, 0, $nombreC);
echo json_encode($pedidoanew->GuardarPedido($mysqli));











?>