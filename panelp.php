<?php
  session_start();
  if(isset($_SESSION['Rol'])){
  
?>
<!DOCTYPE html>
<html lang="en">

<!--header-->
<?php
            require("header.php");
         ?>

<!--sidebar-->
<?php
                require("sidebar.php");
            ?>
<!-- contenido-->
<div id="layoutSidenav_content">

  <div class="sb-sidenav-menu-heading">Personas</div>
  <a <?php if($_SESSION['Rol'] != 1){ ?> style="display:none;" <?php } ?> class="nav-link collapsed" href="#"
    data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
    Usuarios
    <div class="sb-sidenav-collapse-arrow"></div>
  </a>
  <!--  <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><i class="fas fa-angle-down"></i>
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>-->
  <a <?php if($_SESSION['Rol'] != 1){ ?> style="display:none;" <?php } ?> class="nav-link collapsed" href="#"
    data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
    Clientes
    <div class="sb-sidenav-collapse-arrow"></div>
  </a>
  <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">

  </div>
  <div class="sb-sidenav-menu-heading">Pedidos</div>
  <a class="nav-link" href="charts.html">
    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
    Pedido
  </a>
  <a class="nav-link" href="tables.html">
    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
    Factura
  </a>
</div>
</div>
<div class="sb-sidenav-footer">
  <div class="small">Logged in as:</div>
  Start Bootstrap
</div>
</nav>
</div>
<div id="layoutSidenav_content">
  <main>

    <h2> <?php echo "<h4> Bienvenido - ".$_SESSION['User']."</h4>";?></h2>



    <div class="container-fluid px-4">
      <h1 class="mt-4">Administrador</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Administrador</li>
      </ol>
      <div class="row">
        <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
            <div class="card-body">Primary Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
            <div class="card-body">Warning Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
            <div class="card-body">Success Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
            <div class="card-body">Danger Card</div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-white stretched-link" href="#">View Details</a>
              <div class="small text-white"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>


    </div>

  </main>
  <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
      <div class="d-flex align-items-center justify-content-between small">
        <div class="text-muted">Copyright &copy; Mr Coffee 2022</div>
        <!-- <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div> -->
      </div>
    </div>
  </footer>
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

<script>
function GoPedido() {
  .$post('pedidos.php'

    , {

    },
    function(data) {

    }

  );
}
</script>

</body>

</html>
<?php
	}else{
		header("Location:index.php");
	}
?>