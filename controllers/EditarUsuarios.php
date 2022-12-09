<?php
	if(isset($_POST)){
		include("../conexion.php");
		include("../php/Usuarios.php");
	  $iduser = @$_POST["usuario"];
	  $name= @$_POST["nombre"];
	  $pass= @$_POST["contra"];
	  $email= @$_POST["correo"];
		//$rol=@$_POST["rol"];
	  $Usuario = new Usuarios();
	  $Usuario->Setup($iduser, $name, $pass,$email);
		echo json_encode($Usuario->modificarUsuario( $mysqli ));
}