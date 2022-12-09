<?php

include('../../php/Pedidos/Pedidos.php');

$ccliente=@$_POST["IdCliente"];
$fecha=@$_POST["idfecha"];
$idpedido = @$_POST["idpedido"];
$nombreC = @$_POST["NombreCliente"];
$pedidoanew = new Pedido();
$pedidoanew->Constructor($idpedido, 0, $fecha, 0 , $ccliente, 0, $nombreC);
echo json_encode($pedidoanew);











?>