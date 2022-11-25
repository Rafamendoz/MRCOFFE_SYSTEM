<?php
    $server = "162.241.62.192:3306";
    $userbd = "fhopenet_mrcoffedb";
    $password = "DaLgPkLvAtvG";
    $db = "fhopenet_MrCoffe";
	//Conecto
	try{
		$conexion = new PDO('mysql:host='.$server.';dbname='.$db,$userbd,$password);
	}catch(PDOException $e){
		echo "Error de conexion! ";
		exit;
	}
	return $conexion;
?>
