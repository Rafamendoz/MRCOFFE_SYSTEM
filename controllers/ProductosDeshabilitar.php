<?php

include('conexion.php');
if (!empty($_POST['eliminar'])) {
    $id = $_POST["id"];


        $query = "UPDATE producto SET idestado=2 WHERE idproducto=".$id;

        $detalle = mysqli_query($mysqli, $query);

        if ($detalle) {
            echo "<div class='alert alert-success'>Producto Eliminado</div>";
            
        } else {
            echo "<div class='alert alert-success'>Error al Eliminar </div>";
        }
    } else {
        echo "";

    
}





?>