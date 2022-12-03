<?php
	if(isset($_POST)){
		include("../conexion.php");

		$idempleados = @$_POST["idempleados"];
		

		if (trim($idempleados)==""){

			$respuesta="2";
		}
		else{ //Hacer la insercion del alumno

			//Defino las variables para conectar
			

			mysqli_query($mysqli,
				"delete from empleados where idempleados='".$idempleados."'"
		
			);

		
		if (mysqli_error($mysqli)){

			$respuesta="2";

		}else {
				$respuesta="9";
		}

			

		}

	}else{

		//Si no hay un POST entonces retornamos al sitio orígen
	$respuesta="2";
	}
		echo $respuesta;
?>
