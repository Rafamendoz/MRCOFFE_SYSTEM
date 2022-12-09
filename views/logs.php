<?php
	include('../conexion.php');
			$query = "SELECT idrol, rol from rol";
			$result = mysqli_query($mysqli, $query);

?>
<?php

include('cabecera.php');
if(isset($_SESSION['Rol'])){

}
 
 require_once '../php/Log.php';
  
 define("ERROR_LOG", "E");
 define("INFO_LOG", "I");
  
 $log = new Log("logs.txt");
  
 $log->writeLine(ERROR_LOG, "Se ha producido un error");
 $log->writeLine(INFO_LOG, $_SESSION['Rol']);
  
 $log->close();
  
 ?>[E][09-12-2022 01:13:08]: Se ha producido un error
[I][09-12-2022 01:13:08]: Mensaje de informacion