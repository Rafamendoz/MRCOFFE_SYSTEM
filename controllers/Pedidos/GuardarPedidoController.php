<?php

include('../../php/Pedidos/pedidos.php');
include("../../conexion.php");

$ccliente=@$_POST["IdCliente"];
$fecha=@$_POST["idfecha"];
$idpedido = @$_POST["idpedido"];
$nombreC = @$_POST["NombreCliente"];
$horaa = @$_POST["Hora"];
$pedidoanew = new Pedido();
$pedidoanew->Constructor($idpedido, 1, $fecha, $horaa , $ccliente, 1, $nombreC);


echo $pedidoanew->GuardarPedido($mysqli);











?>