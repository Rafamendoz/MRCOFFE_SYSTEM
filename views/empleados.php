<?php



?>

<?php
require("cabecera.php");

if (isset($_SESSION['Rol'])) {
?>

    <?php
    include("../conexion.php");
    $query1 = "select COUNT(*) as total from empleados";
    $total = mysqli_query($mysqli, $query1);
    $row1 = mysqli_fetch_array($total);
    $query2 = "select empleados.idempleados, empleados.nombre, empleados.apellido, empleados.identidad,
    empleados.fechaContratacion, empleados.direccion, empleados.telefono, empleados.idCargo,
    empleados.idusuarios from empleados WHERE idestado=1;
        
    "; //Orden de la tabla
    $detalle = mysqli_query($mysqli, $query2);
    ?>
    <?php
    include("../conexion.php");

    $query = "SELECT idcargo, nombrecargo from cargos";
    $result = mysqli_query($mysqli, $query);


    $query2 = "SELECT idusuarios, nombre from usuarios  WHERE idestado=1";
    $result2 = mysqli_query($mysqli, $query2);

    ?>

    <!DOCTYPE html>
    <html lang="es">

    <!-- contenido-->

    <main>
        <div class="d-flex flex-column bd-highlight">

            <div class=" bd-highlight align-items-center">
                <div class="panelnav ">
                    <div class="shadow p-3 mb-1 bg-body rounded">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb cabecerap">
                                <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Empleados</li>
                            </ol>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="container-fluid m-30">

                <div class="card-header  bg-dark text-light">
                    <h1>Registrar Empleado</h1>

                </div>

                <div class="container-fluid px-5">
                    <form id="form" class="row" method="POST">

                        <br>
                        <div class="row">

                            <div class="col-sm-1 ">
                                <label for="nomal">ID</label>
                                <input type="text" maxlength="60" class="form-control" id="idempleados" placeholder="ID" name="id"><br>
                            </div>

                            <div class="col-sm-3 ">
                                <label for="nomal">Nombre:</label>
                                <input type="text" maxlength="60" required class="form-control" id="nombre" placeholder="Ingrese el nombre" name="nombre">
                            </div>

                            <div class="col-sm-3">
                                <label for="nomal">Apellido:</label>
                                <input type="text" maxlength="60" required pattern="[a-z]{1,15}" class="form-control" id="apellido" placeholder="Ingrese el Apellido" name="apellido">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label for="nomal">identidad:</label>
                                <input type="number" maxlength="60" required class="form-control" id="identidad" placeholder="Ingrese el numero de identidad" name="descripcion">
                            </div>
                            <div class="col-sm-4 form-group">
                                <label for="nomal">Fecha contratacion:</label>
                                <input type="date" maxlength="60" class="form-control" id="fechaContratacion" placeholder="0000-00-00" name="fechaContratacion">
                            </div>
                        </div>

                        <div class="row" height="50">
                            <div class="col-sm-4 form-group">
                                <label for="nomal">Direccion:</label>
                                <input type="text" maxlength="60" class="form-control" id="direccion" placeholder="Ingrese la direccion" name="descripcion">
                            </div>

                            <div class="col-lg-4 form-group">

                                <label for="nomal">Telefono:</label>
                                <input type="number" maxlength="8" pattern="{8}" class="form-control" id="telefono" placeholder="Ingrese el numero de telefono" name="descripcion">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 ">
                                <div>
                                    <label for="apeal">Cargos</label>

                                    <select id="idcargo" required name="idcargo" title="Id Cargo" class="  form-control form-group" data-live-search="true">
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                            <option value="<?php echo $row['idcargo'] ?>"><?php echo $row['nombrecargo']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="apeal">Usuario</label>


                                    <select id="idusuarios" required name="idusuarios" title="idusuarios" class="  form-control form-group" data-live-search="true">
                                        <?php
                                        while ($row = mysqli_fetch_array($result2)) {
                                        ?>

                                            <option value="<?php echo $row['idusuarios'] ?>"><?php echo $row['nombre']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-8">
                                <button id="" type="button" onclick="RegistrarEmpleado()" class="btn btn-warning" value="ingresar">Agregar Empleado</button>
                            </div>
                        </div>



                    </form>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <!--<th>Acciones</th-->
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">identidad</th>
                                <th scope="col">fechaCont.</th>
                                <th scope="col">direccion</th>
                                <th scope="col">telefono</th>
                                <th scope="col">idCargo</th>
                                <th scope="col">idusuario</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row2 = mysqli_fetch_array($detalle)) {
                            ?>
                                <tr>

                                    <td><?php echo $row2['idempleados'] ?></td>
                                    <td><?php echo $row2['nombre'] ?></td>
                                    <td><?php echo $row2['apellido'] ?></td>
                                    <td><?php echo $row2['identidad'] ?></td>
                                    <td><?php echo $row2['fechaContratacion'] ?></td>
                                    <td><?php echo $row2['direccion'] ?></td>
                                    <td><?php echo $row2['telefono'] ?></td>
                                    <td><?php echo $row2['idCargo'] ?></td>
                                    <td><?php echo $row2['idusuarios'] ?></td>
                                    <td>
                                        <a href="CrudEmpleados.php?id=<?php echo $row2['idempleados'] ?>" class="btn btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <a href="" onclick="" class="btn btn-dark">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>

                        </tbody>

                    </table>
                    <script>
                        function generarReporte() {
                            window.open("../views/fpdf/ReporteEmpleados.php");
                        }
                    </script>


                    <button class="btn btn-warning col-2" onclick="return generarReporte()">Generar Reporte</button>


                </div>
            </div>
        </div>
    </main>

    <!-- fin contenido-->


    <!--funciones -->


    <script type="text/javascript">
        function RegistrarEmpleado() {

            var idempleados = document.getElementById("idempleados").value;
            var nombre = document.getElementById("nombre").value;
            var apellido = document.getElementById("apellido").value;
            var identidad = document.getElementById("identidad").value;
            var fechaContratacion = document.getElementById("fechaContratacion").value;
            var direccion = document.getElementById("direccion").value;
            var telefono = document.getElementById("telefono").value;
            var idcargo = document.getElementById("idcargo").value;
            var idusuarios = document.getElementById("idusuarios").value;
            //alert(nombre+'-'+apellido+'-'+identidad+'-'+fechaContratacion+'-'+ 
            //direccion+'-'+ telefono+'-'+ idcargo+'-'+ idusuarios);
            $.post(
                "../WSEmpleado/InsertarEmpleado.php", {
                    'idempleados': idempleados,
                    'nombre': nombre,
                    "apellido": apellido,
                    "identidad": identidad,
                    "fechaContratacion": fechaContratacion,
                    "direccion": direccion,
                    "telefono": telefono,
                    "idcargo": idcargo,
                    "idusuarios": idusuarios,
                },
                function(data) {

                    Validar(data);

                }
            );


        }




        function Validar(error) {
            //alert(error);
            if (error == 1) {
                alert("Ingresado correctamente");
                cancelar();
            } else if (error == 3) {
                alert("Ya existe un empleado con esta identidad");
            } else if (error == 9) {
                alert("Empleado eliminado correctamente");
                cancelar();
            } else if (error == 8) {
                alert("Empleado modificado correctamente");
                cancelar();
            } else {
                //alert(error);
                alert("Todos los campos deben de ser llenados");
            }
        }

        function cancelar() {
            javascript: location.reload();
        }
    </script>

    </body>

    </html>

    <?php
    include('pie.php');
    ?>

<?php
} else {
    header("Location: http://localhost/PROYECTODW/index.php", TRUE, 301);
  die();}

?>