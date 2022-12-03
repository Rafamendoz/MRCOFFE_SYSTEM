<?php
include 'conexion.php';

if (!empty($_POST['registrar'])) {
    if (isset($_POST['codigo']) && !empty($_POST['codigo']) &&
        isset($_POST['producto']) && !empty($_POST['producto']) &&
        isset($_POST['descripcion']) && !empty($_POST['descripcion'])  &&
        isset($_POST['precio']) && !empty($_POST['precio'])) {

        $codigo = $_POST['codigo']; 
        if (strlen($codigo) !=4) {
            echo "<div class='alert alert-warning'>El Código debe ser de 4 digitos</div>";
            return;
        }

        $producto = $_POST['producto'];
//        check length producto
            if (strlen($producto) > 50) {
                echo "<div class='alert alert-warning'>El nombre del producto es demasiado largo debe contener maximo 30 caracteres</div>";
                return;
            }
            if (strlen($producto) < 3) {
                echo "<div class='alert alert-warning'>El nombre del producto es demasiado corto debe contener al menos 3 caracteres</div>";
                return;
            }
       
        $descripcion = $_POST['descripcion'];
//        check length descripcion
            if (strlen($descripcion) > 50) {
                echo "<div class='alert alert-warning'>El apellido es demasiado largo debe contener maximo 30 caracteres</div>";
                return;
            }
            if (strlen($descripcion) < 3) {
                echo "<div class='alert alert-warning'>El apellido es demasiado corto debe contener al menos 3 caracteres</div>";
                return;
            }
            
            $precio = $_POST['precio'];
            if (strlen($precio) > 3) {
                echo "<div class='alert alert-warning'>El precio debe ser menor a 4 digitos</div>";
                return;
            }

       
        

        $sql = "INSERT INTO producto (idproducto, nombreproducto, descripcion, precio ) VALUES ('$codigo','$producto', '$descripcion', '$precio')";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            echo "<div class='alert alert-success'>Producto Registrado </div>";
        } else {
            echo "<div class='alert alert-danger'>Error al Registrar Producto</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error al Registrar </div>";


    }
}
