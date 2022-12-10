<?php
session_start();
  if (isset($_SESSION['Rol'])){

  } else {
  
    header("Location: http://localhost/PROYECTODW/inde1x.php", TRUE, 301);

    die();


  }


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
    <br>
      <div class="panelnav ">
        <div class="shadow p-3 mb-1 bg-body rounded">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb cabecerap">
              <li class="breadcrumb-item"><a href="../panelp.php">Panel Principal</a></li>
              <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <br>
    <div class="px-5 bd-highlight">
    

      <div class="section-usuario">
        <div class=" card d-flex mb-5" id="contener">
          <div class="card-header  bg-dark text-light">
            <h1>Producto</h1>
          </div>
          <script>
          function eliminar() {
            var respuesta = confirm("¿Está seguro de eliminar el Producto?");
            return respuesta;


          }
          </script>
          <div class="container-fluid px-5">
            <form method="POST" class="row">
              <?php
                include 'conexion.php';
                /*   include 'controllers/ProductosEliminarController.php';*/
                include 'controllers/ProductosInsertarController.php';
              ?>
              <br>
              <div class="row">
                <div class="col-sm-2 form-group">
                  <label for="codigo">Código</label>
                  <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el Código" />
                </div>
                <br><br><br><br>
              </div>

              <div class="row" height="50">
                <div class="col-sm-4 form-group" >
                  <label for="producto">Producto</label>
                  <input type="text" class="form-control" id="producto" name="producto"
                    placeholder="Ingrese el Producto" />
                    <br>
                </div>  
                <br>
                <div class="col-sm-4 form-group">
                  <label for="precio">Precio</label>
                  <input type="number" class="form-control" id="precio" name="precio" placeholder="Ingrese el precio" />
                </div>
                <br>
              </div>
              
              <div class="row">
                <div class="col-md-8 form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" name="descripcion"
                    placeholder="Ingrese la Descripción" />
                </div>
                <br>
                <br>
              </div>
              <br>
              <div class="mt-2"><br>
                
                <button type="submit" class="btn btn-warning" onsubmit="" name="registrar" value="ok">
                  Agregar Producto
                </button>
                <button type="reset" class="btn btn-dark">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
          <div class="bg-dark bg-gradient text-white p-2 mx-3 mt-3 ">
            <h3 class="">Listado de Productos</h3>
          </div>

          <div class="card-body">
            <table id="datatablesSimple">
              <thead>
                <tr>

                  <th id="">Código</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Precio</th>
                  <th>Acciones</th>
                </tr>
              </thead>

              <tbody>
                <?php
                            include 'conexion.php';
                            $query = "SELECT * FROM producto";
                            $result = mysqli_query($mysqli, $query);
                            while ($row = mysqli_fetch_array($result)) {
                            ?>
                <tr>

                  <td scope="row"><?php echo $row['idproducto'] ?></td>
                  <td><?php echo $row['nombreproducto'] ?></td>
                  <td><?php echo $row['descripcion'] ?></td>
                  <td><?php echo $row['precio'] ?></td>
                  <td>
                    <a href="productosModificar.php?id=<?php echo $row['idproducto'] ?>" class="btn btn-warning">
                      <i class="fa-solid fa-pen-to-square"></i> </a>
                    <a href="productosEliminar.php?id=<?php echo $row['idproducto'] ?>" class="btn btn-dark ">
                      <i class="fa-solid fa-trash"></i></a>
                  </td>
                </tr>
                <?php
                            }
                            ?>
              </tbody>
            </table>
            <script>
            function generarReporte() {
              window.open("../PROYECTODW/views/fpdf/ReporteProductos.php");
            }
            </script>
            <button class="btn btn-warning col-2" onclick="return generarReporte()">Generar Reporte</button>
          </div>

        

      </div>

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
 


<script type="text/javascript">
        function hora(){
        const fecha = new Date();
        var now = fecha.toLocaleTimeString('en-GB');
        return now;
        }

        function fecha(){
            const fecha = new Date();
            var idfecha = formatoFecha(fecha, "yy-mm-dd");
            return idfecha;
        }

        function formatoFecha(fecha, formato) {
        const map = {
            dd: fecha.getDate(),
            mm: fecha.getMonth() + 1,
            yy: fecha.getFullYear().toString().slice(-2),
            yyyy: fecha.getFullYear()
        }

          return formato.replace(/dd|mm|yy|yyy/gi, matched => map[matched])
        }

        function GetIdUser(){
            let idusuario = <?php echo $_SESSION['iduser']; ?>;
            return idusuario;
        }

        function Vitacora(modulo, descripcion, usuarioResponsable, accion, hora, fecha){
            $.post("../controllers/Vitacora/InsertarItemVitacoraController.php",
            {"modulo":modulo,"descripcion":descripcion, "usuarioResponsable":usuarioResponsable, "accion":accion, "hora":hora, "fecha":fecha}, 
            function(data)
            {
                var resp = JSON.parse(data);
                console.log(resp);

            });

        }

</script> 

  </body>

</html>
