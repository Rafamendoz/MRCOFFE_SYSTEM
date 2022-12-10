<?php
include "../conexion.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM cliente WHERE idcliente = $id";
$resultado = $mysqli->query($consulta);

?>
<?php
    include('cabecera.php');
    if(isset($_SESSION['Rol'])){
?>

<div class="d-flex flex-column bd-highlight">
    <div class=" bd-highlight align-items-center">
        <div class="panelnav ">
            <div class="shadow p-3 mb-1 bg-body rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb cabecerap">
                        <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
                        <li class="breadcrumb-item"><a href="clientes.php">Clientes</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Modificar Cliente </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="card-header  bg-dark text-light">
            <h3>Modificar Cliente</h3>

        </div>
        <div class="card mb-4">
            <br>
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Datos del cliente
            </div>
            <div class="card-body">
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
                            <button type="submit" class="btn btn-warning" onsubmit="" name="modificar" value="ok">
                                Modificar Cliente
                            </button>
                        <?php } ?>
                        <button  type="button" onclick="regresar()" class="btn btn-dark">Cancelar</button>
                        </div>
                </form>
            </div>    
        </div>
    </div>
    <script type="text/javascript">
        function regresar() {
            window.location = "clientes.php";
        }
    </script>
    <?php
    include('pie.php');
    ?>
    <?php
    }else{
        header("Location: http://localhost/PROYECTODW/index.php", TRUE, 301);
        die();}
    
?>