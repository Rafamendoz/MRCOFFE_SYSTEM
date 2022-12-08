<?php
include("../../conexion.php");
include("../../php/Productos.php");

$cod= @$_POST["idproducto"];
$producto = new Productos();
echo json_encode($producto->BuscarProductoPorId($cod, $mysqli));
?>