<?php
include('cabecera.php'); 
?>

<main>


    <div class=" bd-highlight align-items-center">
        <div class="panelnav ">
            <div class="shadow p-3 mb-1 bg-body rounded">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb cabecerap">
                        <li class="breadcrumb-item">Panel Principal</li>
                        <li class="breadcrumb-item " aria-current="page"><a href="pedidos.php">Pedidos</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Generar Pedido</li>
                    </ol>
                </nav>
            </div>

        </div>

        <div class="p-2 bd-highlight">
              <p>Generar Pedido</p>
        </div>

        <div class="px-5 bd-highlight">
            <form class="row g-3 " method="get" action="detallepedido.php">
                <div class="col-md-1 text-center">
                    <label for="inputIdPedido" class="form-label">N. Pedido</label>
                    <input type="text" class="form-control" name="Idpedido" value="11101"  readonly ></label>
                </div>

                <div class="col-md-1 text-center">
                    <label for="inputPassword4" class="form-label">C. Cliente</label>
                    <input type="text" class="form-control" name="IdCliente" value="1">
                </div>

                <div class="col-md-9 text-center">
                    <label for="inputPassword4" class="form-label" >Nombre del Cliente</label>
                    <input type="text" class="form-control" id="inputPassword5" value="Edwin Rafael"  readonly>
                </div>

                <div class="col-md-1 text-center align-items-center">
                    <?php $gener=1 ;
                        if($gener==1){
                            echo <<< EOT
                                        <i class="fa-solid fa-user-tie fa-3x"></i>
                                        EOT;
                        }else{

                            echo <<< EOT
                            <i class="fa-solid fa-person-dress fa-3x"></i>
                            EOT;

                        }
                        
                ?>
              

                </div>
                            
                

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Generar PreOrden</button>
                </div>
            </form>

        </div>
                   

                        

    </div>

</main>


<?php
include('pie.php'); 
?>