<?php
include 'conexion.php';

if (!empty($_POST['eliminar'])) {
    
        $id = $_POST['id'];
       

        $sql = "DELETE FROM producto WHERE idproducto='$id'";
        $result = mysqli_query($mysqli, $sql);
        if ($result) {
            echo "<div class='alert alert-success'>Producto Eliminado</div>";
            
        } else {
            echo "<div class='alert alert-success'>Error al Eliminar </div>";
        }
    } else {
        echo "";

    
}
/*include 'conexion.php';
if (!empty($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "DELETE FROM producto WHERE idproducto='$id'";
    $result = mysqli_query($mysqli, $sql);
    
    
        
        header("Location:../productos.php");
        echo "<div class='alert alert-success'>Producto eliminado correctamente</div>";
   }else{
    echo "<div class='al
   }ert alert-success'>Pno</div>";
   }*/
    
