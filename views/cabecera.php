<?php
session_start();
if (isset($_SESSION['Rol']))





?>


<?php
echo <<<EOT
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Mr Coffee</title>
            <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
            <link href="../css/styles.css" rel="stylesheet" />
            <link href="../css/stylep.css" rel="stylesheet" />
            <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        </head>
        <body class="sb-nav-fixed">
          <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
              <!-- Navbar Brand-->
              <a class="navbar-brand ps-3" href="../panelp.php">Mr Coffee
              </a>
              <!-- Sidebar Toggle-->
              <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
              <!-- Navbar Search-->
              <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class=" input-group">
                    <input class="form-control" type="text" placeholder="Busqueda..." aria-label="Search for..."
                      aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                      class="fas fa-search"></i></button>
                </div>
              </form>
              <!-- Navbar-->
              <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          <li><a class="dropdown-item" href="#!">Settings</a></li>
                          <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                          <li><hr class="dropdown-divider" /></li>
                          <li><a class="dropdown-item"  href="../salir.php">Logout</a></li>
                      </ul>
                  </li>
              </ul>
          </nav>
          <div id="layoutSidenav">
              <div id="layoutSidenav_nav">
                  <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                      <div class="sb-sidenav-menu">
                          <div class="nav">
                              
                              <div class="sb-sidenav-menu-heading">Personas</div>                       
      EOT; 
      ?>

          <a href="usuario.php" <?php if ($_SESSION['Rol'] != 1) { ?> style="display:none;" <?php } ?> class="nav-link"
            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
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
          <a <?php if ($_SESSION['Rol'] != 1) { ?> style="display:none;" <?php } ?> class="nav-link collapsed" href="clientes.php"
            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
            Clientes
            <div class="sb-sidenav-collapse-arrow"></div>
          </a>
          <a <?php if($_SESSION['Rol'] != 1){ ?> style="display:none;" <?php } ?> class="nav-link collapsed" href="empleados.php"
            aria-expanded="false" aria-controls="collapsePages">
            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
            Empleado
            <div class="sb-sidenav-collapse-arrow"></div>
          </a>
          <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">

          </div>
          <div class="sb-sidenav-menu-heading">Pedidos</div>
          <a class="nav-link" href="pedidos.php">
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
            <?php echo $_SESSION['User']; ?>
          </div>
          </nav>
          </div>
          <div id="layoutSidenav_content">