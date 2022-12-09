
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
                  
                    
                    <input type="hidden" maxlength="60" class="form-control" id="idempleados"
                    value="<?php echo $datos->idempleados ?>"
                      placeholder="Ingrese el ID del producto" name="id"><br>

                 
              </div>

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

                        <option value="<?php echo $datos->idusuarios; ?>"><?php echo $row ['nombre'];?></option>
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

  </div>

  <script type="text/javascript">

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
    
    //para validar 
    cnom = document.getElementById("nombre");
    cape = document.getElementById("apellido");
    cide = document.getElementById("identidad");
    cdir = document.getElementById("direccion");
    ctel = document.getElementById("telefono");
    //
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

        if(nombre.length < 3 ){
            alert("El NOMBRE es demasiado corto");
            cnom.style.borderColor = "red";

        }else if(apellido.length < 3 ){
            cnom.style.borderColor = "";
            alert("El APELLIDO es demasiado corto");                      
            cape.style.borderColor = "red";

        }else if(identidad.length != 13 ){
            cnom.style.borderColor = "";
            cape.style.borderColor = "";
            alert("La IDENTIDAD debe ser de 13 digitos");
            cide.style.borderColor = "red";

        }else if(direccion.length < 4 ){
            cnom.style.borderColor = "";
            cape.style.borderColor = "";
            cide.style.borderColor = "";
            alert("La DIRECCION es demasiado corta");
            cdir.style.borderColor = "red";

        }else if(telefono.length != 8 ){
            cnom.style.borderColor = "";
            cape.style.borderColor = "";
            cide.style.borderColor = "";
            cdir.style.borderColor = "";
            alert("El TELEFONO debe ser de 8 digitos");
            ctel.style.borderColor = "red";

        }else{
            cnom.style.borderColor = "";
            cape.style.borderColor = "";
            cide.style.borderColor = "";
            cdir.style.borderColor = "";
            ctel.style.borderColor = "";
            Validar(data);
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
        header("Location:index.php");
    }
?>