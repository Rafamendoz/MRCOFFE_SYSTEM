<?php

include('conexion.php');
$id = $_GET["id"];


$query = "UPDATE producto SET idestado=2 WHERE idpedido=".$id;

$detalle = mysqli_query($mysqli, $query);

header('Location: productos.php');












?>