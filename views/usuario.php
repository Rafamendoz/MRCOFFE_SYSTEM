<?php
include('cabecera.php'); 
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

    <div class="p-2 bd-highlight">
      <p>Gestión de Usuarios</p>

    </div>

    <div class="px-5 bd-highlight">

      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-5">
            <div class="card-body">Generar Pedido</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Reporte de Pedidos</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>

      </div>
      <div class="row" id="formulario">

        <form class="container" action="" method="post ">
          <h3 class="modal-title text-center m-10px-b">Registrar Usuario</h3>

          <br />

          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="idal">Identidad del Alumno</label>
                <input type="text" maxlength="13" class="form-control" id="idalumno" placeholder="Ingrese la identidad "
                  name="idalumno">
              </div>
            </div>
            <button type="button" onclick="Buscarusuario()" class="btn btn-default" value="guardar">Buscar</button>
          </div>

          <br />
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" maxlength="13" class="form-control" name="nombre" id="nombre" style="color:black">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="rol">Rol de Usuario</label>
                <input type="text" maxlength="13" class="form-control" name="roles" id="idrol"
                  placeholder="Ingrese el apellido ">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="correo">Correo Electronico</label>
                <input type="email" maxlength="13" class="form-control" name="email" id="correo"
                  placeholder="john@example.com" style="color:black;">
              </div>
            </div>
          </div>
          <br>



          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="nomal">Usuario</label>
                <input type="text" maxlength="60" class="form-control" id="user" placeholder="Ingrese el usuario"
                  name="user">
              </div>
            </div>
          </div>


          <br />

          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="apeal">Contraseña</label>
                <input type="password" maxlength="60" class="form-control" id="contra"
                  placeholder="Ingrese la contraseña" name="contra">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <button id="ocultar" type="button" onclick="RegistrarUsuario()" class="btn btn-default"
                value="guardar">Guardar</button>
              <button type="button" onclick="cancelar();" class="btn btn-default" value="Cancelar">Cancelar</button>

            </div>
            <div id="mostrar" style='display:none'>
              <button type="button" onclick="ModificarUsuario()" class="btn btn-default"
                value="guardar">Modificar</button>
              <button type="button" onclick="EliminarUsuario ()" class="btn btn-default"
                value="guardar">Eliminar</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>




</main>


<?php
include('pie.php'); 
?>