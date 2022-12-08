<?php
include('cabecera.php'); 
include('../conexion.php');
 

?>

<main>
<div class=" bd-highlight align-items-center">
        <div class="panelnav">
            <div class="shadow p-3 mb-1 bg-body rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb cabecerap">
                        <li class="breadcrumb-item">Panel Principal</li>
                        <li class="breadcrumb-item " aria-current="page"><a href="pedidos.php">Factura</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">Facturas</li>
                   
                    </ol>
                </nav>
            </div>

        </div>


        <div class="bg-dark bg-gradient text-white p-2 mx-3 mt-3 ">
                <p class="p1">Facturas </p>
        </div>
            
        <div class="px-3 mx-3  pb-4 bg-body shadow rounded">

           
            

            <div class="row">
                <div class="col-1 2">
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
                        <tr>
                            <td>1</td>
                            <td>3</td>
                            <td>12/02/2022</td>
                            <td>332</td>
                            <th><a href="#">Ver detalle</a></th>
                        </tr>

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
