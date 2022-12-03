<?php

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM cliente WHERE idcliente='$id'";
    $result = mysqli_query($mysqli, $sql);
    if ($result) {
        echo "<div class='alert alert-success'>Cliente eliminado correctamente</div>";
    } else {
        echo "<div class='alert alert-danger'>Error al eliminar el cliente</div>";
    }
}
