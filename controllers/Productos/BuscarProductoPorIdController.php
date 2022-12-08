<?php
include("../../conexion.php");
include("../../php/Productos.php");

$cod= @$_POST["idproducto"];
$producto = new producto();
echo json_encode($producto->BuscarProductoPorId($cod, $mysqli));
?>