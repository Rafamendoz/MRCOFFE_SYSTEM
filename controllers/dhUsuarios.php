<?php

include('../conexion.php');
$idusuarios = $_GET["user"];


$query = "UPDATE pedido SET idEstadoPedido=2 WHERE idusuarios=" . $idusuarios;

$detalle = mysqli_query($mysqli, $query);

header('Location: ../views/usuario.php');