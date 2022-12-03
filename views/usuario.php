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

    <div class="p-2 bd-highlight text-light">
      <p>Gestión de Usuarios</p>

    </div>

    <div class="px-5 bd-highlight">

      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-5">
            <div class="card-body">Reporte de Usuarios</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>


      </div>
      <div class="section-usuario">
        <div class=" card text-center d-flex p-md-2" id="contener">
          <div class="card-header p-2 bg-warning text-light">
            <h1>Registrar Usuario</h1>
          </div>
          <div class="row" id="formulario">


            <form class="card-body" action="" method="post ">

              <div class="input-group ">
                <input class="form-control" type="text" placeholder="Ingrese la id " aria-label="Search for..."
                  aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button" onclick="Buscarusuario()"><i
                    class="fas fa-search"></i></button>

              </div>
              <div class="form-row d-flex justify-content-between text-center m-5-t" id="forma">
                <div class="form-group col-md-9">
                  <label for="nomal">Usuario</label>
                  <input type="text" class="form-control  " id="name" placeholder="Ingrese el usuario" name="user">
                </div>
              </div>
              <div class="form-row d-flex justify-content-between text-center m-5-t" id="forma">
                <div class="form-group col-md-9">
                  <label for="apeal">Contraseña</label>
                  <input type="password" class="form-control" id="contra" placeholder="Ingrese la contraseña"
                    name="contra">
                </div>
              </div>
              <div class="form-row d-flex justify-content-between text-center m-md-2">
                <div class="form-group col-md-9">
                  <label for="correo">Correo Electronico</label>
                  <input type="email" class="form-control" name="email" id="correo" placeholder="john@example.com">
                </div>
              </div>
              <div class="form-row d-flex justify-content-between text-center m-md-2">
                <div class="form-group col-md-9">
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

              <div class="form-row d-flex ">
                <div class="col-md-4">
                  <button id="ocultar" type="button" onclick="RegistrarUsuario()" class="form-control btn btn-warning"
                    value="guardar">Guardar</button>
                </div>
                <div class="col-md-4  " id="boton">
                  <button type="button" onclick="cancelar();" class="form-control btn btn-dark"
                    value="Cancelar">Cancelar</button>

                </div>
                <div class="form-group col-md-4">
                  <div id="mostrar" style='display:none'>
                    <button type="button" onclick="ModificarUsuario()" class=" form-control btn btn-warning"
                      value="guardar">Modificar</button>
                    <button type="button" onclick="EliminarUsuario ()" class=" form-control btn btn-default"
                      value="guardar">Eliminar</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="card card-body" id="imagen">
            <img class="card-img-top" src="../img/usuario.png" alt="usuario">

          </div>
        </div>



      </div>


    </div>
  </div>




</main>


<?php
include('pie.php'); 
?>