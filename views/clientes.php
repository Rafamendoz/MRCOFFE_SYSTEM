<?php
include('cabecera.php');
?>
<div class="d-flex flex-column bd-highlight mt-2">
    <div class=" bd-highlight align-items-center">
        <div class="panelnav ">
            <div class="shadow p-3 mb-1 bg-body rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb cabecerap">
                        <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
    <script>
        function eliminar() {
            var respuesta = confirm("¿Está seguro de eliminar el cliente?");
            return respuesta;

        }
    </script>
    <div class="container fluid row m-2">
        <div class="p-2 bd-highlight">
            <h3>Clientes</h3>

        </div>


        <form method="POST" class="row">
            <?php
            include '../conexion.php';
            include '../controllers/EliminarCliente.php';
            include '../controllers/AgregarClienteController.php';
            ?>
            <div class="col-6">
                <div class="form-group">
                    <label for="nombres">Nombre</label>
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Ingrese los nombres" />
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Ingrese los apellidos" />
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion" />
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono" />
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electronico</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo" />
                </div>
                <div class="form-group">
                    <label for="identidad">RTN</label>
                    <input type="text" class="form-control" id="identidad" name="identidad" placeholder="Ingrese el numero de identidad" />
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success" onsubmit="" name="registrar" value="ok">
                    Agregar Cliente
                </button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
        </form>
        <div class="row p-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">RTN</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../conexion.php';
                    $query = "SELECT * FROM cliente";
                    $result = mysqli_query($mysqli, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $row['idcliente'] ?></th>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['apellido'] ?></td>
                            <td><?php echo $row['direccion'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td><?php echo $row['identidad'] ?></td>
                            <td>
                                <a href="modificarCliente.php?id=<?php echo $row['idcliente'] ?>" class="btn btn-success">
                                    Editar
                                </a>
                                <a href="clientes.php?id=<?php echo $row['idcliente'] ?>" onclick="return eliminar()" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php
                    }


                    ?>


                </tbody>
            </table>
        </div>
    </div>

    <?php
    include('pie.php');
    ?>