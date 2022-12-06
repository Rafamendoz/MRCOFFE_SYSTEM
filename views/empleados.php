<?php
  session_start();
  if(isset($_SESSION['Rol'])){

?>
<?php
  include("../conexion.php");
    $query1="select COUNT(*) as total from empleados";
    $total=mysqli_query($mysqli,$query1);
    $row1 = mysqli_fetch_array($total);
    $query2= "select empleados.idempleados, empleados.nombre, empleados.apellido, empleados.identidad,
    empleados.fechaContratacion, empleados.direccion, empleados.telefono, empleados.idCargo,
    empleados.idusuarios from empleados
        
    "; //Orden de la tabla
    $detalle =mysqli_query($mysqli,$query2);
?>
<?php
    require("cabecera.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
                <!-- contenido-->

        <main>

        <h2> <?php echo "<h4>  - ".$_SESSION['User']."</h4>";?></h2>

            <div class="container-fluid px-4">
                <h1 class="mt-4">Empleados</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Detalles</li>
                </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Gestionar Empleados

                            <a href="CrudEmpleados.php" class="btn btn-primary btn-circle" data-toggle="modal" data-target="#createMdl">
                                <i class="fas fa-plus"></i>

                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <!--<th>Acciones</th-->
                                    <th scope="col" >id</th>
                                    <th scope="col" >Nombre</th>
                                    <th scope="col" >Apellido</th>
                                    <th scope="col" >identidad</th>
                                    <th scope="col" >fechaCont.</th>
                                    <th scope="col" >direccion</th>
                                    <th scope="col" >telefono</th>
                                    <th scope="col" >idCargo</th>
                                    <th scope="col" >idusuario</th>
                                    <th scope="col" >Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php 	while (	$row2 = mysqli_fetch_array($detalle))
                                {
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
                                <a href="" class="edit-form-data" data-toggle="modal" data-target="#editMdl"
                                >
                                    <i class="far fa-edit"></i>
                                </a>
                                
                                <a href="" class="delete-form-data" data-toggle="modal" data-target="#deleteMdl"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                </td>
                            </tr>
                                <?php
                                }
                                ?>

                            </tbody>

                        </table>
                        <h4 id="reporte">Total de productos registrados:	<?php echo $row1['total']?></h4>

                    </div>
                </div>
                </div>
        </main>
            <!-- fin contenido-->

                <!-- footer-->
  
            
    
    <!--funciones -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script>


        </script>

<?php
    include('pie.php');
?>
<?php
	}else{
		header("Location:index.php");
	}
?>