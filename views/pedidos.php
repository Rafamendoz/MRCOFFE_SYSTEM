<?php
include('cabecera.php'); 
?>


<main>
  <div class="d-flex flex-column bd-highlight ">
      <div class=" bd-highlight align-items-center">
        <div class="panelnav ">
          <div class="shadow p-3 mb-1 bg-body rounded">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb cabecerap">
                <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
              </ol>
            </nav>
          </div>

        </div>
      </div>
      
      <div class="row px-3 mb-2 text-center ">
        <p>Gestion de Pedidos</p>
      </div>

      <div class="row px-5">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-5">
            <div class="card-body">Generar Pedido</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="createorder.php">Ver Detalles</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3    col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body">Pedidos Realizados</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="pedidosr.php">Ver Detalles</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Reporte de Pedidos</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">Ver Detalles</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">Pedidos Anulados</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="pedidosa.php">Ver Detalles</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>

    </div>

 
 

  <div class=" bd-highlight text-center">
    <img src="../img/pedidoimg.jpg" alt="pedidoimage" width="40%" height="40%">

  </div>



</main>


<?php
include('pie.php'); 
?>