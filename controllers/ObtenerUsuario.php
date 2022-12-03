<?php
	include("../conexion.php");
	include("../php/Usuarios.php");
		$Usuario = new Usuario();
		$iduser= @$_POST["usuario"];
		echo json_encode($Usuario->ObtenerUsuariosById($iduser,$conexion));

?>