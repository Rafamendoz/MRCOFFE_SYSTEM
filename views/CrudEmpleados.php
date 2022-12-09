

<?php
	include("../conexion.php");

			$query = "SELECT idcargo, nombrecargo from cargos";
			$result = mysqli_query($mysqli, $query);

?>
<?php
	include("../conexion.php");

			$query2 = "SELECT idusuarios, nombre from usuarios";
			$result2 = mysqli_query($mysqli, $query2);

?>
<?php
include "../conexion.php";
$id = $_GET['id'];
$h= "ola";
$consulta = "SELECT * FROM empleados WHERE idempleados = $id";
$resultado = $mysqli->query($consulta);

echo "<script>console.log('Console: " .$id . "' );</script>";
?>

<?php
include('cabecera.php'); 
if(isset($_SESSION['Rol'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
				<script src='../js/jquery.min.js'></script>
				</head>
<!-- contenido-->


<main>
  <div class="d-flex flex-column bd-highlight">
    
  <div class=" bd-highlight align-items-center">
      <div class="panelnav ">
        <div class="shadow p-3 mb-1 bg-body rounded">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb cabecerap">
              <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
              <li class="breadcrumb-item"><a href="empleados.php">Empleados</a></li>
              <li class="breadcrumb-item active" aria-current="page">Modificar Empleado</li>
            </ol>
          </nav>
        </div>

      </div>
    </div>

    <div class="container-fluid px-4">
      <div class="card-header  bg-dark text-light">
            <h1>Modificar Empleado</h1>
        </div>
      <br>
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Datos del Empleado
        </div>
        <div class="card-body">
          <div id="formulario">
            <form id="form" method="POST">

            <?php
            while ($datos = $resultado->fetch_object()) {
            ?>


              <div class="row">
                <div class="col-lg-4 form-group">
                  
                    <label for="nomal">Nombre:</label>
                    <input type="text" maxlength="60" required class="form-control" id="nombre"
                    value="<?php echo $datos->nombre; ?>"
                      placeholder="Ingrese el nombre" name="nombre">
                  
                </div>
                <div class="col-lg-4 form-group">
                  
                    <label for="nomal">Apellido:</label>
                    <input type="text" maxlength="60" required pattern="[a-z]{1,15}" class="form-control" id="apellido"
                    value="<?php echo $datos->apellido; ?>"
                    placeholder="Ingrese el Apellido" name="apellido">
                  
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 form-group">
                  
                    <label for="nomal">identidad:</label>
                    <input type="number" maxlength="60" required class="form-control" id="identidad"
                    value="<?php echo $datos->identidad; ?>"
                    placeholder="Ingrese el nombre del producto" name="descripcion">
                  
                </div>
                <div class="col-lg-4 form-group">
                  
                    <label for="nomal">Fecha contratacion:</label>
                    <input type="text" maxlength="60" class="form-control" id="fechaContratacion" placeholder=""
                    value="<?php echo $datos->fechaContratacion; ?>"
                    name="descripcion">
                  
                </div>
              </div>

              <div>
                <div class="col-md-8 form-group">
                  <div>
                    <label for="nomal">Direccion:</label>
                    <input type="text" maxlength="60" class="form-control" id="direccion"
                    value="<?php echo $datos->direccion; ?>" 
                    placeholder="Ingrese la direccion" name="descripcion">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 form-group">
                <div>
                  <label for="nomal">Telefono:</label>
                  <input type="number" maxlength="8" pattern="{8}" class="form-control" id="telefono"
                  value="<?php echo $datos->telefono; ?>"  
                  placeholder="Ingrese el nombre del producto" name="descripcion">
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-4 form-group">
                  <div>
                    <label for="apeal">Cargos</label>
                    <div id="idcgo" title="Elija una categoria">

                      <select id="idcargo" required name="idcargo" title="Id Cargo" class="  form-control form-group"
                        data-live-search="true" value="<?php echo $datos->idCargo; ?>">

                        <?php
											while ($row = mysqli_fetch_array($result))
											{
											?>

                        <option value="<?php echo $row['idcargo']?>"><?php echo $row ['nombrecargo'];?></option>
                        <?php
											}
											?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 form-group">
                  <div>
                    <label for="apeal">Usuario</label>
                    <div id="usuarui" title="Elija un usuario">

                      <select id="idusuarios" required name="idusuarios" title="idusuarios"
                        class="  form-control form-group" data-live-search="true"
                        value="<?php echo $datos->idusuarios; ?>">
                        <?php
											while ($row = mysqli_fetch_array($result2))
											{
											?>

                        <option value="<?php echo $row['idusuarios']?>"><?php echo $row ['nombre'];?><?php echo $datos->idusuarios; ?></option>
                        <?php
											}
											?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>


              
                <button type="button" onclick="ModificarEmpleado()" class="btn btn-warning"
                  value="modificar">Modificar</button>
                <button type="button" onclick="regresar()" class="btn btn-dark" value="Cancelar">
                  Cancelar</button>
              
              <?php } ?>
            </form>

          </div>

        </div>
      </div>
    </div>
    <main>
      <!-- fin contenido-->

      <!-- footer-->

  </div>









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
    //alert(idempleados);
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

  function ModificarEmpleado() {
    var idempleados = document.getElementById("idempleados").value;
    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var identidad = document.getElementById("identidad").value;
    var fechaContratacion = document.getElementById("fechaContratacion").value;
    var direccion = document.getElementById("direccion").value;
    var telefono = document.getElementById("telefono").value;
    var idcargo = document.getElementById("idcargo").value;
    var idusuarios = document.getElementById("idusuarios").value;
    $.post(
      "../WSEmpleado/EditarEmpleado.php", {
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

  function Buscar() {
    var idempleados = document.getElementById("idempleados").value;


    $.post(
      "../WSEmpleado/ObtenerEmpleado.php", {
        'idempleados': idempleados,

      },
      function(data) {

        alert(data);
        if (data == "2") {
          alert("no ingreso la identidad del Empleado");
        } else if (data == "3") {
          alert("no se encontro alumno con esa identidad");
        } else {
          document.getElementById('mostrar').style.display = 'block';
          document.getElementById('ocultar').style.display = 'none';
          $("#idalumno").prop("disabled", true);

          var datos = data.split("-");
          document.getElementById("nombre").value = datos[0];
          document.getElementById("apellido").value = datos[1];
          document.getElementById("identidad").value = datos[2];
          var a = datos[3];
          var b = datos[4];
          var c = datos[5];
          document.getElementById("fechaContratacion").value = a + '-' + b + '-' + c;
          document.getElementById("direccion").value = datos[6];
          document.getElementById("telefono").value = datos[7];
          var idcar = datos[8];
          document.getElementById("idcargo").value = idcar;
          document.getElementById("idusuarios").value = datos[9];
        }

      }
    );
  }

  function EliminarEmpleado() {
    var idempleados = document.getElementById("idempleados").value;


    $.post(
      "../WSEmpleado/EliminarEmpleado.php", {
        'idempleados': idempleados

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
      regresar();
    } else {
      //alert(error);
      alert("Todos los campos deben de ser llenados");
    }
  }

  function regresar() {
    window.location = "empleados.php";
  }
  function cancelar() {
    javascript: location.reload();
  }
  </script>

  </body>

  </html>

  <?php
    }else{
      header("Location: http://localhost/PROYECTODW/index.php", TRUE, 301);
      die();}
    
?>