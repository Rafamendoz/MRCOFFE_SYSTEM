<!DOCTYPE html>
<?php
    include_once 'database.php';

    session_start();

    if(isset($_GET['cerrar_sesion'])){
        session_unset();

        session_destroy();
    }

    if(isset($_SESSION['rol'])){
        switch($_SESSION['rol']){
            case 1:
                header('location: admin.php');
            break;

            case 2:
            header('location: views/Vista.php');
            break;

            default:
        }
    }

    if(isset($_POST['usuario']) && isset($_POST['contra'])){
        $username = $_POST['usuario'];
        $password = $_POST['contra'];

        $db = new Database();
        $query = $db->connect()->prepare('SELECT*FROM usuarios WHERE nombre = :usuario AND password = :password');
        $query->execute(['nombre' => $usuario, 'password' => $password]);

        $row = $query->fetch(PDO::FETCH_NUM);
        if($row == true){
            // validar rol
            $rol = $row[3];
            $_SESSION['rol'] = $rol;

            switch($_SESSION['rol']){
                case 1:
                    header('location: admin.php');
                break;
    
                case 2:
                header('location: views/Vista.php');
                break;
    
                default:
            }
        }else{
            // no existe el usuario
            echo "El usuario o contraseña son incorrectos";
        }

    }
    

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body>
    <section class="inicio">
        <div class="imagen">

        </div>
        <div class="forma">
            <h1 id="title-2">LOGIN</h1>
                <form action="Rol.php" method="POST" >
                    <div class="input">
                        <input type="text" name="usuario" id="usuario"> 
                    </div>
                    <div class="label">
                        <label for="nombre">USER</label>
                    </div>
                    <div class="input">
                        <input type="password" name="contra" id="contra" > 
                    </div>
                    <div class="label">
                        <label for="nombre">PASSWORD</label>
                    </div>

                    <div class="btn">
                            <input type="submit" class="btnlogin"  value="LOGIN" id="enviar"><br>
                        
                    </div>
                    <a href="restablecer.php">¿Ha olvidado la contraseña?</a>
                       
                    
                </form>

        </div>

    </section>

    <script src="js/jquery.min.js"></script>


    <script>
        
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>