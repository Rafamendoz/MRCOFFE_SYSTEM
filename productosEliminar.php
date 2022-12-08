<?php
  session_start();
  if(isset($_SESSION['Rol'])){
  
?>
<?php
include "conexion.php";
$id = $_GET['id'];
$consulta = "SELECT * FROM producto WHERE idproducto = $id";
$resultado = $mysqli->query($consulta);

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
   
            
                             
                    
<div class="d-flex flex-column bd-highlight">
    <div class=" bd-highlight align-items-center">
        <div class="panelnav ">
            <div class="shadow p-3 mb-1 bg-body rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb cabecerap">
                        <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
                        <li class="breadcrumb-item"><a href="productoss.php">producto</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Eliminar producto </li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>

    <div class="container-fluid px-4">
        <div class="card-header  bg-dark text-light">
            <h3>Eliminar producto</h3>

        </div>
        <div class="card mb-4">
            <br>
           
            <div class="card-body">
             
    <form method="POST" class="row">
            <?php
            include 'conexion.php';
            include 'controllers/ProductosEliminarController.php';
            ?>
            <?php
            while ($datos = $resultado->fetch_object()) {
            ?>
            <div class="col-6">
            <div class="col-6">
                
                    <input type="hidden"  class="form-control" id="id" name="id" placeholder="Ingrese el Código" value="<?php echo $datos->idproducto; ?>" />          
                    <input type="hidden" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la Descripción" value="<?php echo $datos->descripcion; ?>" />
                    <input type="hidden" class="form-control" id="producto" name="producto" placeholder="Ingrese el Producto" value="<?php echo $datos->nombreproducto; ?>"/>
                    <label for="d">¿Desea eliminar el Producto <?php echo $datos->nombreproducto; ?> ?</label>
                    </div>    
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-warning" onsubmit="" name="eliminar" value="ok">
                    Eliminar Producto
                </button>
                <?php } ?>
                <a href="productos.php" class="btn btn-dark">
                                              Cancelar</a>
            </div>
        </form>
                            
                     

                         </div>
                            
                        </div>
                        
                    <!-- fin contenido-->

                <!-- footer-->
                <?php
                require("footer.php");
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
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

