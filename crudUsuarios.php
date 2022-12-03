<?php
  session_start();
  if(isset($_SESSION['Rol'])){
  
?>
<!DOCTYPE html>
<html lang="en">
<!-- sidebar-->
<?php
        require("header.php");
    ?>
<!-- sidebar-->
<?php
            require("sidebar.php");
        ?>

<div id="layoutSidenav_content">

  <!-- contenido-->

  <main>

    <h2> <?php echo "<h4>  - ".$_SESSION['User']."</h4>";?></h2>

    <div class="container-fluid px-4">
      <h1 class="mt-4">Usuarios</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Administrador</li>
      </ol>
      <br /><br /><br /><br />

      <div id="formulario">
        <h3 class="modal-title text-center m-10px-b">Registrar Usuario</h3>
        <form>
          <div class="form-row d-flex">
            <div class="input-group ">
              <input class="form-control" type="text" placeholder="Busqueda..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
              <button class="btn btn-primary" id="btnNavbarSearch" type="button" onclick="Buscarusuario()"><i
                  class="fas fa-search"></i></button>

            </div>
            <div class="form-group col-md-4">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
          </div>
          <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
          </div>
          <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
          </div>
          <div class="form-row d-flex ">
            <div class="form-group col-md-6">
              <label for="inputCity">City</label>
              <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
              <label for="inputState">State</label>
              <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="inputZip">Zip</label>
              <input type="text" class="form-control" id="inputZip">
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Check me out
              </label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Sign in</button>
        </form>

        <div class="row">
          <div class="col-md-4">
            <button id="ocultar" type="button" onclick="RegistrarUsuario()" class="btn btn-default"
              value="guardar">Guardar</button>
            <button type="button" onclick="cancelar();" class="btn btn-default" value="Cancelar">Cancelar</button>

          </div>
          <div id="mostrar" style='display:none'>
            <button type="button" onclick="ModificarUsuario()" class="btn btn-default"
              value="guardar">Modificar</button>
            <button type="button" onclick="EliminarUsuario ()" class="btn btn-default" value="guardar">Eliminar</button>
          </div>
        </div>
        </form>
      </div>

    </div>
  </main>
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
<script>


</script>

</body>

</html>
<?php
	}else{
		header("Location:index.php");
	}
?>
<!--- Creacion de funciones en javascript--->

<script type="text/javascript">
function RegistrarUsuario() {
  let idalumno = document.getElementById("user").value;
  let nombre = document.getElementById("nombre").value;
  let contra = document.getElementById("contra").value;
  let rol = document.getElementById("idrol").value;
  var correo = document.getElementById("correo").value;
  alert(idalumno + nombrealumno + apellidoalumno);
  $.post("php/WS/PostInsertarAlumno.php", {
      'id': usuario,
      'nombre': nombre,
      "contra": contra,
      "rol": rol,
      "correo": correo



    },
    function(data) {


      console.log(data);
      var resp = JSON.parse(data);
      console.log(resp);


    }
  );
}



function ObtenerAlumnos() {
  var idalumno = document.getElementById("idalumno").value;
  $.post("php/WS/ObtenerAlumnosByIDWS.php", {
      'idalumno': idalumno


    },

    function(data) {

      console.log(data);
      var resp = JSON.parse(data);
      console.log(resp);
      document.getElementById('mostrar').style.display = 'block';
      document.getElementById('ocultar').style.display = 'none';
      $("#idalumno").prop("disabled", true);
      document.getElementById("idalumno").value = resp.Id;
      document.getElementById("nombrealumno").value = resp.Nombre;
      document.getElementById("apellidoalumno").value = resp.Apellido;
      document.getElementById("iddepartamento").value = resp.Iddepa;



    }

  );

}










function cancelar() {
  javascript: location.reload();
}
</script>