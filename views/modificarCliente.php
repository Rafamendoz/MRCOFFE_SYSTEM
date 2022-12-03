<?php
include "../conexion.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM cliente WHERE idcliente = $id";
$resultado = $mysqli->query($consulta);

?>
<?php
include('cabecera.php');
?>

<div class="d-flex flex-column bd-highlight">
    <div class=" bd-highlight align-items-center">
        <div class="panelnav ">
            <div class="shadow p-3 mb-1 bg-body rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb cabecerap">
                        <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Modificar Cliente </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="container fluid row m-2">
        <div class="p-2 bd-highlight">
            <h3>Modificar Cliente</h3>

        </div>

        <form method="POST" class="col-4">
            <?php
            include '../conexion.php';
            include '../controllers/ModificarClienteController.php';
            ?>
            <?php
            while ($datos = $resultado->fetch_object()) {
            ?>
                <input type="hidden" name="id" value="<?php echo $datos->idcliente ?>">
                <div class="form-group">
                    <label for="nombres">Nombre</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese los nombres" value="<?php echo $datos->nombre; ?>" />
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos" value="<?php echo $datos->apellido; ?>" />
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion" value="<?php echo $datos->direccion; ?>" />
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono" value="<?php echo $datos->telefono; ?>" />
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electronico</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo" value="<?php echo $datos->correo; ?>" />
                </div>
                <div class="form-group">
                    <label for="identidad">Numero de Identidad</label>
                    <input type="text" class="form-control" id="identidad" name="identidad" placeholder="Ingrese el numero de identidad" value="<?php echo $datos->identidad; ?>" />
                </div>


                <div class="mt-2">
                    <button type="submit" class="btn btn-success" onsubmit="" name="modificar" value="ok">
                        Modificar Cliente
                    </button>
                <?php } ?>
                <button type="reset" class="btn btn-danger">Cancelar</button>
                </div>
        </form>

    </div>
    <?php
    include('pie.php');
    ?>