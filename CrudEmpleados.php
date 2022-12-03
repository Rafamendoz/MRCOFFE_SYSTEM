<?php
  session_start();
  if(isset($_SESSION['Rol'])){
  
?>
<?php
	include("conexion.php");

			$query = "SELECT idcargo, nombrecargo from cargos";
			$result = mysqli_query($mysqli, $query);

?>
<?php
	include("conexion.php");

			$query2 = "SELECT idusuarios, nombre from usuarios";
			$result2 = mysqli_query($mysqli, $query2);

?>
<?php
include('cabecera.php'); 
?>



<!-- contenido-->


<main>
  <div class="d-flex flex-column bd-highlight">
    <div class=" bd-highlight align-items-center">
      <div class="panelnav ">
        <div class="shadow p-3 mb-1 bg-body rounded">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb cabecerap">
              <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
              <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
            </ol>
          </nav>
        </div>

      </div>
    </div>

    <h2> <?php echo "<h4>  - ".$_SESSION['User']."</h4>";?></h2>

    <div class="container-fluid px-4">
      <h1 class="mt-4">Empleados</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
      </ol>
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Modificar Empleados
        </div>
        <div class="card-body">
          <div id="formulario">
            <form id="form" method="POST">

              <?php

					?>
              <div class="row">
                <div class="">
                  <div class="col-sm-2 form-group">
                    <label for="nomal">ID</label>
                    <input type="text" maxlength="60" class="form-control" id="idempleados"
                      placeholder="Ingrese el ID del producto" name="id"><br>

                    <button type="button" onclick="Buscar()" class="centrarBotonBuscar" value="buscar">Buscar</button>
                    <button type="button" onclick="cancelar()" class="centrarBotonBuscar"
                      value="limpiar">Limpiar</button>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-4 form-group">
                  <div>
                    <label for="nomal">Nombre:</label>
                    <input type="text" maxlength="60" required class="form-control" id="nombre"
                      placeholder="Ingrese el nombre" name="nombre">
                  </div>
                </div>
                <div class="col-lg-4 form-group">
                  <div>
                    <label for="nomal">Apellido:</label>
                    <input type="text" maxlength="60" required pattern="[a-z]{1,15}" class="form-control" id="apellido"
                      placeholder="Ingrese el Apellido" name="apellido">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 form-group">
                  <div>
                    <label for="nomal">identidad:</label>
                    <input type="number" maxlength="60" required class="form-control" id="identidad"
                      placeholder="Ingrese el nombre del producto" name="descripcion">
                  </div>
                </div>
                <div class="col-lg-4 form-group">
                  <div>
                    <label for="nomal">Fecha contratacion:</label>
                    <input type="text" maxlength="60" class="form-control" id="fechaContratacion" placeholder=""
                      name="descripcion">
                  </div>
                </div>
              </div>
              <div>
                <div class="col-md-8 form-group">
                  <div>
                    <label for="nomal">Direccion:</label>
                    <input type="text" maxlength="60" class="form-control" id="direccion"
                      placeholder="Ingrese la direccion" name="descripcion">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 form-group">
                <div>
                  <label for="nomal">Telefono:</label>
                  <input type="number" maxlength="8" pattern="{8}" class="form-control" id="telefono"
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
                        data-live-search="true">

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
                        class="  form-control form-group" data-live-search="true">
                        <?php
											while ($row = mysqli_fetch_array($result2))
											{
											?>

                        <option value="<?php echo $row['idusuarios']?>"><?php echo $row ['nombre'];?></option>
                        <?php
											}
											?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>



              <br />
              <button id="ocultar" type="button" onclick="RegistrarEmpleado()" class="centrarBoton"
                value="ingresar">Ingresar</button>
              <div id="mostrar" style='display:none'>
                <button type="button" onclick="ModificarEmpleado()" class="centrarBoton"
                  value="buenas">Modificar</button>
                <button type="button" onclick="EliminarEmpleado()" class="centrarBoton" value="buenas">Eliminar</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    <main>
      <!-- fin contenido-->

      <!-- footer-->
      <?php
                require("footer.php");
                ?>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
  <script src="js/scripts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
  <script src="assets/demo/chart-area-demo.js"></script>
  <script src="assets/demo/chart-bar-demo.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
  <script src="js/datatables-simple-demo.js"></script>








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
      "WSEmpleado/InsertarEmpleado.php", {
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
      "WSEmpleado/EditarEmpleado.php", {
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
      "WSEmpleado/ObtenerEmpleado.php", {
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
      "WSEmpleado/EliminarEmpleado.php", {
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
	}else{
		header("Location:index.php");
	}
?>