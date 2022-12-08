<?php
include('cabecera.php'); 

?>
<?php
    include('../conexion.php');
    $query = "select codigoFactura, facturas.idpedido, facturas.fecha, facturas.total
    from facturas"; 
    
    $detalle = mysqli_query($mysqli, $query);
?>
<main>
    <script>
        function generarFactura(id){
            window.open("../PROYECTODW/views/fpdf/ReporteProductos.php?id=" + id);
        }
        </script>
<div class=" bd-highlight align-items-center">
        <div class="panelnav">
            <div class="shadow p-3 mb-1 bg-body rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb cabecerap">
                        <li class="breadcrumb-item">Panel Principal</li>
                        <li class="breadcrumb-item " aria-current="page"><a href="pedidos.php">Factura</a> </li>
                        
                   
                    </ol>
                </nav>
            </div>

        </div>


        <div class="bg-dark bg-gradient text-white p-2 mx-3 mt-3 ">
                <p class="p1">Facturas </p>
        </div>
            
        <div class="px-3 mx-3  pb-4 bg-body shadow rounded">

           
            

            <div class="row">
                <div class="col-12">
                  <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Codigo Factura</th>
                            <th>Codigo Pedido</th>
                            <th>Fecha</th>
                            <th>Total</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($row = mysqli_fetch_array($detalle)) {
                            ?>
                        <tr>
                            <td><?php echo $row['codigoFactura'] ?></td>
                            <td><?php echo $row['idpedido'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td><?php echo $row['total'] ?></td>
                            <th><a href="<?php echo "/PROYECTODW/views/fpdf/Factura.php?id=".$row['codigoFactura'] ?>">Ver detalle</a></th>
                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                  </table>
                </div>
               
            </div>
   
        </div>
</div>



</main>



<?php
include('pie.php'); 
?>
