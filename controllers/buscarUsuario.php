<?php

include("../conexion.php");
include("../php/Usuarios.php");


$Usuario = new Usuarios();

echo json_encode($Usuario->BuscarUsuarios($mysqli));





?>