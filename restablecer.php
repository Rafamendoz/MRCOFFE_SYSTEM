<?php
require 'conexion.php';
require 'funciones.php';

$errors = array();
if(!empty($_POST)){

    if(!isEmail($email)){

        $errors[]="Debe ingresar un correo electronico valido";
        if(emailExiste($email)){
        
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECUPERAR PASSWORD</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="loginbox" style=" margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
            <div class="panel-heading">
            <div class="panel-title">Recuperar Password</div>
            <div style="float:right; font-size: 80%; position:relative; top:-10px"><a href="index.php">Iniciar Sesi&oacute;n</a></div>

        
        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

        <form  id="loginform" class="form-horizontal" role="form" action="<?php $_SERVER['PHP_SELF']?>" method="POST" autocomplete="off">
            <div style="margin-bottom:25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input  id="email" type="email" class="form-control" name="email" placeholder="email" required>
            </div>
            <div style="margin-top:10px" class="form-group">
                <div class="col-sm-12 controls">
                <button id="btn-login" type ="submit" class="btn btn-success">Enviar</a>
           </div>
    </div>
    <div class="form-group">
        <div class="col-md-12 control">
        <div style="border-top:1px solid#888; padding-top:15px; font-size:85%">
        </div>
         </div>
    </div>
    </form>


    </div>
    </div>
    </div>
    </div>
    
</body>
</html>