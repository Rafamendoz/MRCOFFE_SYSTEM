<?php 
include("../../conexion.php");
include("../../php/Vitacora/Vitacora.php");

$modulo = @$_POST["modulo"];
$descripcion = @$_POST["descripcion"];
$usuarioResponsable = @$_POST["usuarioResponsable"];
$accion = @$_POST["accion"];
$hora =@$_POST["hora"];
$fecha = @$_POST["fecha"];

$vitacora = new Vitacora();
$vitacora->Constructor($modulo, $descripcion, $usuarioResponsable, $accion, $hora, $fecha);
echo json_encode($vitacora->GuardarAccion($mysqli));











?>