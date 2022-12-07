<!--sidebar-->
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">Personas</div>
                            <a <?php if($_SESSION['Rol'] != 1){ ?>  style="display:none;"  <?php } ?> class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div  class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"></div>
                            </a>
                     
                            <a <?php if($_SESSION['Rol'] != 1){ ?>  style="display:none;"  <?php } ?> class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div  class="sb-nav-link-icon"><i class="fas fa-book-open" ></i></div>
                                Clientes
                                <div class="sb-sidenav-collapse-arrow"></div>
                            </a>
                            <a <?php if($_SESSION['Rol'] != 1){ ?>  style="display:none;"  <?php } ?> class="nav-link collapsed" href="views/empleados.php"  aria-expanded="false" aria-controls="collapsePages">
                                <div  class="sb-nav-link-icon"><i class="fas fa-book-open" ></i></div>
                                Empleado
                                <div class="sb-sidenav-collapse-arrow"></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                
                            </div>
                            <div  class="sb-sidenav-menu-heading">Pedidos</div>
                            <a class="nav-link" href="productos.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-boxes-stacked"></i></div>
                                Productos
                            </a>
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
                        <?php echo $_SESSION['User'];?>
                    </div>
                </nav>
            </div>