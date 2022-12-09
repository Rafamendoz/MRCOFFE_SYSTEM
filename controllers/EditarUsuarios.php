<?php
	if(isset($_POST)){
		include("../conexion.php");
		include("../php/Usuarios.php");
	  $iduser = @$_POST["usuario"];
	  $name= @$_POST["nombre"];
	  $pass= @$_POST["contra"];
	  $email= @$_POST["correo"];
		$idEstado=@$_POST["estado"];
	  $Usuario = new Usuarios();
	  $Usuario-> Setup($iduser, $name, $pass,$email,$idEstado);
		echo json_encode($Usuario->modificarUsuario( $mysqli));
}