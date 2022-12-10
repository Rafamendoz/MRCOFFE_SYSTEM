<?php
require 'conexion.php';
require 'funciones.php';



if (!empty($_POST)) {
  $email = $mysqli->real_escape_string($_POST['email']);

  if (isEmail($email)) {



    if (emailExiste($email)) {
      $user_id = getValor('correo', 'correo', $email);
      $nombre = getValor('nombre', 'correo', $email);

      $token = generaTokenPass($email);
      $url = 'http://localhost/PROYECTODW/cambia_pass.php?user_id=' . $user_id . '&token=' . $token;
      $asunto = 'Recuperar Password';
      $cuerpo = "Hola $nombre:<br/><br/> Se ha solicitado un reinicio de  contrase&ntilde;a, visita la siguiente direcci&oacute;n: <a href='$url'>$url</a>";

      if (enviarEmail($email, $nombre, $asunto, $cuerpo)) {
        echo "Hemos enviado un correo electronico a la direccion $email para restablecer tu password. <br/>";
        echo "<a href='index.php'>Iniciar Sesion</a>";
        exit;
      } else {
        $errors[] = "Error al Enviar el  Email";
      }
    } else {
      $errors[] = "No Existe el correo";
    }
  } else {
    echo 'error';
  }
} else {
  echo 'error';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RECUPAR PASSWORD</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Trirong&effect=neon|outline|emboss|shadow-multiple">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container d-flex justify-content-center col-12 ">
    <div id="loginbox bg-warning" style="margin-top:15%; margin-left:10%;" class=" card
        mainbox col-md-10 col-md-offset-2 col-md-10 col-sm-offset-2">
      <div class="card-body">
        <div class="card-header  bg-dark text-light">
          <div class="panel-title  font-effect-emboss "> Recuperar Password</div>
          <div style=" font-size:70%; position: relative; left:70%; top:-25%"><a class="text-light"
              href="index.php">Iniciar Sesión</a>
          </div>
        </div>

        <div style="padding-top:30px" class="card-body">

          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

          <form id="loginform" class="form-horizontal" role="form" action="" method="POST" autocomplete="off">

            <div style="margin-bottom: 25px" class="input-group">

              <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

              <form id="loginform" class="form-horizontal" role="form" action="" method="POST" autocomplete="off">

                <div style="margin-bottom: 25px" class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="email" type="email" class="form-control" name="email" placeholder="email" required="">
                </div>

                <div style="margin-top:10px" class="form-group">
                  <div class="col-sm-12 controls">
                    <button id="btn-login" type="submit" class="btn btn-warning">Enviar
                    </button>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-12 control">
                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">

                    </div>
                  </div>
                </div>
              </form>
              <?php ?>
            </div>
        </div>
      </div>
    </div>
</body>

</html>