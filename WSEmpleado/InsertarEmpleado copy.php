<?php
	if(isset($_POST)){
		include("../conexion.php");
		include("../controllers/EmpleadoController.php");
    
    $nom = @$_POST["nombre"];
    $ape = @$_POST["apellido"];
    $ide = @$_POST["identidad"];
    $fecha = @$_POST["fecha"];
    $dire = @$_POST["direccion"];
    $tele = @$_POST["telefono"];
    $idcar = @$_POST["idcargo"];
    $idus = @$_POST["idusuarios"];

		$EmpleadoActual = new Empleado();
    $EmpleadoActual->SetEmpleado($nom, $ape, $ide, $fecha, $dire, $tele, $idcar, $idus);
		echo json_encode($EmpleadoActual->AddEmpleado($mysqli));
}
?>