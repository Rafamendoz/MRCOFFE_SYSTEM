<?php 

include("../conexion.php");
include("../php/Usuarios.php");


$usuario = @$_POST["usuario"];

$Usuario = new Usuarios();
echo json_encode($Usuario->ObtenerPassByUser($usuario, $conexion));


?>