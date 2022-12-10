<?php

include('../conexion.php');
$idusuarios = $_GET["user"];


$query = "UPDATE Estado SET idEstado=2 WHERE idusuarios=" . $idusuarios;

$detalle = mysqli_query($mysqli, $query);

header('Location: ../views/usuario.php');