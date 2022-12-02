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



        <div class="px-3 bd-highlight ">
            <div class="bg-dark bg-gradient text-white">
                <p>Nuevo Pedido</p>
            </div>
            <div class="px-3 shadow mt-3 pb-4 bg-body rounded">
                <form class="row g-3 " method="get" action="detallepedido.php">
                    <div class="col-md-1 text-center">
                        <label for="inputIdPedido" class="form-label">N. Pedido</label>
                        <input type="text" class="form-control" name="Idpedido" value="11101"  readonly ></label>
                    </div>

                    <div class="col-md-1 text-center">
                        <label for="inputPassword4" class="form-label">C. Cliente</label>
                        <input type="text" class="form-control" name="IdCliente" value="1">
                    </div>

                    <div class="col-md-6 text-center">
                        <label for="inputPassword4" class="form-label" >Nombre del Cliente</label>
                        <input type="text" class="form-control" id="inputPassword5" value="Edwin Rafael"  readonly>
                    </div>

                    <div class="col-md-3   text-center">
                        <label for="inputDate" class="form-label" >Fecha</label>
                        <input type="date" class="form-control" id="inputPassword5" readonly>
                    </div>


                    <div class="col-md-1 text-center align-items-center">
                        <div class="m-3">
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
                       
                

                    </div>


                  


                                
                    

                  
                </form>
                <hr class="hr" />

                <div class="row mb-0">
                    <div class="col-1 text-center">
                        <label for="" class="form-label">Codigo Producto</label>
                    </div>

                    <div class="col-4">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-product-hunt"></i></span>
                            <input type="text" class="form-control" placeholder="Ingrese el codigo del producto" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    <div class="col-3 text-center">
                        <button type="button" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass me-1"></i>Buscar</button>
                        <button type="button" class="btn btn-outline-success"><i class="fa-solid fa-circle-plus me-1"></i>Agregar</button>
                       

                    </div>

                    <div class="col-1 text-center">
                        <label for="totalp">Total Productos</label>
                    </div>

                    <div class="col-2">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-list-check"></i></span>
                            <input type="text" value="1" class="form-control text-center" aria-label="Username" aria-describedby="basic-addon1" readonly>
                        </div>

                    </div>

                  
                  

                    
                </div>

                <hr class="hr" />


                <div class="row">
                    <div class="col-2 align-self-center">
                        <label for="labelNameProduct">Nombre del Producto:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control text-center" value="Cafe sin leche" readonly></input>
                    </div>
                    

                </div>

                <hr class="hr" />

                <div class="row">
                    <h6>Detalle</h3>

                </div>


                

                <div class="row ">
                    <div class="col-2">
                            <button type="submit" class="btn btn-primary">Generar PreOrden</button>
                    </div>
                </div>
            </div>
           

        </div>

                   

                        

    </div>

   

</main>


<?php
include('pie.php'); 
?>