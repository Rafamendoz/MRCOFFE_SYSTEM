<?php 

include("../conexion.php");
include("../php/DetallePedido/DetallePedido.php");


$Dempleado = new DetallePedido();
$idemp= @$_POST[""];
echo json_encode($Dempleado->ObtenerEmpleadoById($idemp,$mysqli));


?>