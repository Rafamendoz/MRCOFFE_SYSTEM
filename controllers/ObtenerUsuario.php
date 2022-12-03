<?php
	include("../conexion.php");
	include("../php/Usuarios.php");
		$Usuario = new Usuarios();
		$iduser= @$_POST["usuario"];
		echo json_encode($Usuario->ObtenerUsuariosById($iduser,$mysqli));

?>