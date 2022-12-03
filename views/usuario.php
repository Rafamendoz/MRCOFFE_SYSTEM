<?php
include('cabecera.php'); 
?>
<?php
	include('../conexion.php');
			$query = "SELECT idrol, rol from rol";
			$result = mysqli_query($mysqli, $query);

?>

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

    <div class="p-2 bd-highlight text-dark">
      <p>Gestión de Usuarios</p>

    </div>

    <div class="px-5 bd-highlight">

      <!-- <div class="row caja">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-5">
            <div class="card-body">Reporte de Usuarios</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>


      </div>-->
      <div class="section-usuario">
        <div class=" card text-center d-flex mb-5" id="contener">
          <div class="card-header  bg-dark text-light">
            <h1>Registrar Usuario</h1>
          </div>
          <div class="row" id="formulario">


            <form class="card-body" action="" method="post ">

              <div class="input-group " id="busca">
                <input class="form-control" type="text" id="user" placeholder="Ingrese la id "
                  aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button" onclick="BuscarUsuario()"><i
                    class="fas fa-search"></i></button>

              </div>
              <div class="form-row d-flex justify-content-between text-center m-5-t" id="forma">
                <div class="form-group col-md-6">
                  <label for="nomal">Usuario</label>
                  <input type="text" class="form-control  " id="name" placeholder="Ingrese el usuario" name="user">
                </div>
                <div class="form-group col-md-6">
                  <label for="apeal">Contraseña</label>
                  <input type="password" class="form-control" id="contra" placeholder="Ingrese la contraseña"
                    name="contra">
                </div>
              </div>

              <div class="form-row d-flex justify-content-between text-center m-md-2">
                <div class="form-group col-md-6">
                  <label for="correo">Correo Electronico</label>
                  <input type="email" class="form-control" name="email" id="correo" placeholder="john@example.com">
                </div>
                <div class="form-group col-md-6">
                  <label for="rol">Rol de Usuario</label>
                  <select id="idrol" name="idrol" title="Roles" class="form-control" data-live-search="true">
                    <?php
                  while ($row = mysqli_fetch_array($result))
                  {
                  ?>

                    <option value="<?php echo $row['idrol']?>"><?php echo $row ['rol'];?></option>
                    <?php
                  }
                  ?>
                  </select>

                </div>

              </div>


            </form>
          </div>
          <!--<div class="card card-body" id="imagen">
            <img class="card-img-top" id="imag" src="../img/usuario.png" alt="usuario">

        </div>-->



          <div class="form-row d-flex ">

            <div class="col-md-4 d-flex  ">
              <button id="ocultar" type="button" onclick="RegistrarUsuario()"
                class="form-control btn btn-warning mx-4 mb-3 " value="guardar">Guardar</button>
              <button type="button" onclick="cancelar();" class="form-control btn btn-dark mx-4 mb-3 "
                value="Cancelar">Cancelar</button>
              <button id="mostrar" style='display:none' type="button" onclick="ModificarUsuario()"
                class=" form-control btn btn-warning mx-4 mb-3 " value="guardar">Modificar</button>
            </div>
            <div class="col-md-4 d-flex ">
              <div id="mostrar" style='display:none'>

                <div class="form-group col-md-4  ">

                  <!-- <button type="button" onclick="EliminarUsuario ()" class=" form-control btn btn-default"
                      value="guardar">Eliminar</button>-->
                </div>
              </div>
            </div>
          </div>
        </div>



      </div>


    </div>
  </div>




</main>
<!--- Creacion de funciones en javascript--->

<script type="text/javascript">
function RegistrarUsuario() {
  var usuario = document.getElementById("user").value;
  var nombre = document.getElementById("name").value;
  var contra = document.getElementById("contra").value;
  var rol = document.getElementById("idrol").value;
  var correo = document.getElementById("correo").value;
  alert(usuario + nombre + correo);
  $.post("../controllers/InsertarUsuario.php", {
      'usuario': usuario,
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


function ModificarUsuario() {
  var usuario = document.getElementById("user").value;
  var nombre = document.getElementById("name").value;
  var contra = document.getElementById("contra").value;
  var rol = document.getElementById("idrol").value;
  var correo = document.getElementById("correo").value;
  alert(usuario + nombre + correo);
  $.post("../controllers/EditarUsuarios.php", {
      'usuario': usuario,
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

function BuscarUsuario() {
  var usuario = document.getElementById("user").value;
  $.post("../controllers/ObtenerUsuario.php", {
      'usuario': usuario


    },

    function(data) {

      console.log(data);
      var resp = JSON.parse(data);
      console.log(resp);

      document.getElementById('mostrar').style.display = 'block';
      document.getElementById('ocultar').style.display = 'none';
      $("#user").prop("disabled", true);
      document.getElementById("user").value = resp.idusuarios;
      document.getElementById("name").value = resp.nombre;
      document.getElementById("contra").value = resp.password;
      document.getElementById("correo").value = resp.correo;
      document.getElementById("idrol").value = resp.idrol;



    }

  );

}










function cancelar() {
  javascript: location.reload();
}
</script>

<?php
include('pie.php'); 
?>