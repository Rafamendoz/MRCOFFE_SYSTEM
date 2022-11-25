<?php
	session_start();
    include_once 'database.php';
    
	$Usuario = $_POST['usuario'];
	$Contraseña = $_POST['contra'];
    $query = $conexion->prepare('SELECT * FROM usuarios WHERE nombre = ? AND 
    password = ?;' );
    $query->execute([$Usuario, $Contraseña]);
    $datos = $query->fetch(PDO::FETCH_OBJ);
    //print_r($datos);

    if ($datos === FALSE){
        header ('location:index.php');
        echo "<script"
    }elseif($query->rowCount() == 1){
        $_SESSION['User'] = $datos->nombre;
        $_SESSION['Rol'] = $datos->idrol;	
        header ('location:panelp.php');
    }
?>	
