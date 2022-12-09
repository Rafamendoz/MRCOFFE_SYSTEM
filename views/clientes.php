<?php
include('cabecera.php');
if (isset($_SESSION['Rol'])) {
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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

  function generarReporte() {
    window.open("../views/fpdf/ReporteClientes.php");
  }
  </script>
  <div class="container-fluid row m-2">
    <div class="card-header  bg-dark text-light">
      <h1>Registrar Clientes</h1>
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
          <label for="direccion">Dirección</label>
          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la direccion" />
        </div>
      </div>

      <div class="col-6">
        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingrese el telefono" />
        </div>
        <div class="form-group">
          <label for="correo">Correo Electrónico</label>
          <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese el correo" />
        </div>
        <div class="form-group">
          <label for="identidad">RTN</label>
          <input type="text" class="form-control" id="identidad" name="identidad"
            placeholder="Ingrese el numero de identidad" />
        </div>
      </div>
      <div class="mt-2">
        <button type="submit" class="btn btn-warning" onsubmit="" name="registrar" value="ok">
          Agregar Cliente
        </button>
        <button type="reset" class="btn btn-dark">Cancelar</button>
      </div>
    </form>
    <div class="row p-4">
      <input class="form-control col-2" id="myInput" type="text" placeholder="Buscar..">
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Dirección</th>
            <th scope="col">Correo</th>
            <th scope="col">Teléfono</th>
            <th scope="col">RTN</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="myTable">
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
              <a href="modificarCliente.php?id=<?php echo $row['idcliente'] ?>" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
              <a href="clientes.php?id=<?php echo $row['idcliente'] ?>" onclick="return eliminar()"
                class="btn btn-dark">
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
      $(document).ready(function() {
        $("#myInput").on("keyup", function() {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
      </script>
    </div>
    <button class="btn btn-warning col-2" onclick="return generarReporte()">Generar Reporte</button>
  </div>

  <?php
        include('pie.php');
        ?>
  <?php
} else {
    header("Location:index.php");
}
    ?>