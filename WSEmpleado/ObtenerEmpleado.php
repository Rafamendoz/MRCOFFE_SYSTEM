<?php
	if(isset($_POST)){
		include("../conexion.php");

		$idempleados = @$_POST["idempleados"];


		if (trim($idempleados)==""){

			$respuesta="2";
		}
		else{ //Hacer la insercion del alumno

			//Defino las variables para conectar


			$result= mysqli_query($mysqli,
				"SELECT nombre, apellido, identidad, fechaContratacion, direccion, telefono, idcargo, idusuarios
				FROM empleados where idempleados='".$idempleados."'"
			);


		$row = mysqli_fetch_array($result);
		if($row!=null){

			$respuesta= $row['nombre']."-".$row['apellido']."-".$row['identidad']."-".$row['fechaContratacion']
			."-".$row['direccion']."-".$row['telefono']."-".$row['idcargo']."-".$row['idusuarios'];
		}else{
			$respuesta="3";
		}


	}
}
		echo $respuesta;
?>
