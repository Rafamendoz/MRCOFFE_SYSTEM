<?php
include '../conexion.php';

if (!empty($_POST['registrar'])) {
    if (isset($_POST['nombres']) && !empty($_POST['nombres']) &&
        isset($_POST['apellidos']) && !empty($_POST['apellidos']) &&
        isset($_POST['direccion']) && !empty($_POST['direccion']) &&
        isset($_POST['telefono']) && !empty($_POST['telefono']) &&
        isset($_POST['correo']) && !empty($_POST['correo']) &&
        isset($_POST['identidad']) && !empty($_POST['identidad'])) {

        $nombres = $_POST['nombres'];
//        check length nombres
        if (strlen($nombres) > 50) {
            echo "<div class='alert alert-warning'>El nombre es demasiado largo debe contener maximo 30 caracteres</div>";
            return;
        }
        if (strlen($nombres) < 3) {
            echo "<div class='alert alert-warning'>El nombre es demasiado corto debe contener al menos 3 caracteres</div>";
            return;
        }

        $apellidos = $_POST['apellidos'];
//        check length apellidos
        if (strlen($apellidos) > 50) {
            echo "<div class='alert alert-warning'>El apellido es demasiado largo debe contener maximo 30 caracteres</div>";
            return;
        }
        if (strlen($apellidos) < 3) {
            echo "<div class='alert alert-warning'>El apellido es demasiado corto debe contener al menos 3 caracteres</div>";
            return;
        }
        $direccion = $_POST['direccion'];
//        check length direccion
        if (strlen($direccion) > 50) {
            echo "<div class='alert alert-warning'>La direccion es demasiado larga</div>";
            return;
        }
        if (strlen($direccion) < 3) {
            echo "<div class='alert alert-warning'>La direccion es demasiado corta</div>";
            return;
        }

        $telefono = $_POST['telefono'];
//        check length telefono
        if (strlen($telefono) != 8) {
            echo "<div class='alert alert-warning'>El telefono debe contener 8 digitos</div>";
            return;
        }
        $correo = $_POST['correo'];
//        validate correo
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-warning'>El correo no es valido</div>";
            return;
        }

        $identidad = $_POST['identidad'];
//        check length identidad
        if (strlen($identidad) != 14) {
            echo "<div class='alert alert-warning'>El numero de identidad debe contener 13 digitos</div>";
            return;
        }

        $sql = "INSERT INTO cliente (nombre, apellido, direccion, telefono, correo, identidad) VALUES ('$nombres', '$apellidos', '$direccion', '$telefono', '$correo', '$identidad')";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            echo "<div class='alert alert-success'>Cliente Registrado Correctamente</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al Registrar Cliente</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error al Registrar Cliente</div>";


    }
}
