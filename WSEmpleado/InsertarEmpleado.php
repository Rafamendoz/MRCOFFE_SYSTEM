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
			$resp= mysqli_query($mysqli,"SELECT count(*) as encontro from empleados where idempleados='$idempleados'");
			 $row1 = mysqli_fetch_array($resp);
			 if($row1['encontro']=="0"){

			mysqli_query($mysqli,
				"insert into empleados(nombre, apellido, identidad, fechaContratacion, direccion, 
				telefono, idcargo, idusuarios, idempleados )
					values('".$nombre."','".$apellido."',".$identidad.",'".$fechaContratacion."','".$direccion."'
					,'".$telefono."','".$idcargo."', '".$idusuarios."','".$idempleados."' )"
			);


		if (mysqli_error($mysqli)){
		
			$respuesta="2";

		}else {
				$respuesta="1";
		}

			}else{
				$respuesta="3";
			}

		}

	}else{

		//Si no hay un POST entonces retornamos al sitio orígen
	$respuesta="2";
	}
		echo $respuesta;
?>
