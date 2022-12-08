<?php
include '../conexion.php';

if (!empty($_POST['modificar'])) {
    if (
        isset($_POST['nombres']) && !empty($_POST['nombres']) &&
        isset($_POST['apellidos']) && !empty($_POST['apellidos']) &&
        isset($_POST['direccion']) && !empty($_POST['direccion']) &&
        isset($_POST['telefono']) && !empty($_POST['telefono']) &&
        isset($_POST['correo']) && !empty($_POST['correo']) &&
        isset($_POST['identidad']) && !empty($_POST['identidad'])) {

        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $identidad = $_POST['identidad'];
        $id = $_POST['id'];

        $sql = "UPDATE cliente SET nombre='$nombres', apellido='$apellidos', direccion='$direccion', telefono='$telefono', correo='$correo', identidad='$identidad' WHERE idcliente='$id'";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            echo "Cliente modificado correctamente";
            header("Location: ../views/registroCliente.php");
        } else {
            echo "Error al modificar el cliente";
        }
    } else {
        echo "Error al modificar el cliente";

    }
}