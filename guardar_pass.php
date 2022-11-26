<?php

require 'conexion.php';
require 'funciones.php';


if(!empty($_POST)){
    $newpass=$_POST['password'];
    $user=$_POST['user_id'];
    $token=$_POST['token'];
    if(cambiaPassword($newpass, $user,$token)){
        header('Location: index.php');
    };
}else{
    echo 'error';
}



?>