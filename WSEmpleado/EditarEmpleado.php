<?php
	if(isset($_POST)){
		include("../conexion.php");

		$idempleados = @$_POST["idempleados"];
		$nombre = @$_POST["nombre"];
		$apellido = @$_POST["apellido"];
		$identidad = @$_POST["identidad"];
		$fechaContratacion = @$_POST["fechaContratacion"];
		$direccion = @$_POST["direccion"];
		$telefono = @$_POST["telefono"];
		$idcargo = @$_POST["idcargo"];
		$idusuarios = @$_POST["idusuarios"];

		if (trim($idempleados)=="" || trim($nombre)=="" ||  trim($apellido)=="" || trim($identidad)=="" || trim($fechaContratacion)==""
        || trim($direccion)=="" || trim($telefono)=="" || trim($idcargo)=="" || trim($idusuarios)==""){

			$respuesta="2";
		}
		else{ //Hacer la insercion del alumno

			//Defino las variables para conectar
			

			mysqli_query($mysqli,
				"update empleados set nombre='".$nombre."', apellido='".$apellido."', 
				identidad=".$identidad.", fechaContratacion='".$fechaContratacion."', direccion='".$direccion."',
                telefono='".$telefono."', idcargo='".$idcargo."', idusuarios='".$idusuarios."'
                 where idempleados='".$idempleados."'"
		
			);

		
		if (mysqli_error($mysqli)){

			$respuesta="2";

		}else {
				$respuesta="8";
		}

			

		}

	}else{

		//Si no hay un POST entonces retornamos al sitio orígen
	$respuesta="2";
	}
		echo $respuesta;
?>
