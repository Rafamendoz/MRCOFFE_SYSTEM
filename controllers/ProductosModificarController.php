<?php
include 'conexion.php';

if (!empty($_POST['modificar'])) {
    if (
        isset($_POST['producto']) && !empty($_POST['producto']) && 
        isset($_POST['descripcion']) && !empty($_POST['descripcion']) &&
        isset($_POST['precio']) && !empty($_POST['precio'])) {


        $producto = $_POST['producto'];
        $id = $_POST['id'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        $sql = "UPDATE producto SET nombreproducto='$producto', descripcion='$descripcion', precio='$precio' WHERE idproducto='$id'";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            echo "<div class='alert alert-success'>Producto Modificado </div>";
        } else {
            echo "<div class='alert alert-success'>Error al Modificar </div>";
        }
    } else {
        echo "Error al modificar el Producto";

    }
}