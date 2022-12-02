<?php
include('cabecera.php'); 
include('../conexion.php');

 $idpedido = $_GET["Idpedido"];

 $query = "SELECT MAX(idpedido) as idpedi FROM pedido";
 $result = mysqli_query($mysqli,$query);
 $pedidon=0;
 while ($row = mysqli_fetch_array($result))
        {
          $pedidon = $row['idpedi']+1;
      
        }

 

?>


<main>


    <div class=" bd-highlight align-items-center">
        <div class="panelnav ">
            <div class="shadow p-3 mb-1 bg-body rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb cabecerap">
                        <li class="breadcrumb-item">Panel Principal</li>
                        <li class="breadcrumb-item " aria-current="page">Pedidos</li>
                        <li class="breadcrumb-item " aria-current="page"><a href="createorder.php">Generar Pedido</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detalle Pedido</li>
                    </ol>
                </nav>
            </div>

        </div>

        <div class="p-2 bd-highlight">
              <p>Detalle de Pedido</p>
        </div>

        <div class="px-5 bd-highlight">
           

        </div>
                   

                        

    </div>

</main>




<?php
include('pie.php'); 
?>