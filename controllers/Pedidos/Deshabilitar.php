<?php

include('../../conexion.php');
$idpedido = $_GET["idpedido"];


$query = "UPDATE pedido SET idEstadoPedido=2 WHERE idpedido=".$idpedido;

$detalle = mysqli_query($mysqli, $query);

header('Location: ../../views/pedidosr.php');












?>