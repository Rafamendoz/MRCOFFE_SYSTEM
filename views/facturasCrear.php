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
                        <li class="breadcrumb-item " aria-current="page"><a href="pedidos.php">Factura</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Generar Factura</li>
                    </ol>
                </nav>
            </div>

        </div>

        <div class="bg-dark bg-gradient text-white p-2 mx-3 mt-3 ">
                <p class="p1">Nueva Factura</p>
        </div>

        <div class="px-3 bd-highlight ">
               
            
            <div class="px-3 shadow mt-3 pb-4 bg-body rounded">
                <form class="row g-3 " >
                    <div class="col-md-2 text-center">
                        <label for="inputIdPedido" class="form-label">N. Pedido</label>
                        <input type="text" class="form-control" name="Idpedido" value="11101"  readonly ></label>
                    </div>

                    
                    <div class="col-md-6 text-center">
                        <label for="inputPassword4" class="form-label" >Nombre del Cliente</label>
                        <input type="text" class="form-control" id="inputPassword5" value="Daniela"  readonly>
                    </div>

                    <div class="col-md-4   text-center">
                        <label for="inputDate" class="form-label" >Fecha</label>
                        <input type="date" class="form-control" id="inputPassword5" readonly>
                    </div>
                  
                </form>


                <hr class="hr" />
                    <div class="row">

                        <div class="col-md-8 text-center">
                        </div>
                        
                        <div class="col-md-4 text-center">
                            <label for="inputIdPedido" class="form-label">Subtotal</label>
                            <input type="text" class="form-control" name="Subtotal" value="441"  readonly ></label>
                        </div>

                    </div>
                
                    <div class="row">

                        <div class="col-md-8 text-center">
                        </div>
                        
                        <div class="col-md-4 text-center">
                            <label for="inputIdPedido" class="form-label">Descuento</label>
                            <input type="text" class="form-control" name="descuento" value="41"  readonly ></label>
                        </div>

                    </div>
                
                    <div class="row">

                        <div class="col-md-8 text-center">
                        </div>
                        
                        <div class="col-md-4 text-center">
                            <label for="inputIdPedido" class="form-label">Total</label>
                            <input type="text" class="form-control" name="Total" value="400"  readonly ></label>
                        </div>

                    </div>
                <hr class="hr mb-1" />

                

                <hr class="hr" />

                <div class="row mb-0">
                    <div class="col-1 text-center">
                        <label for="" class="form-label">Monto Efectivo</label>
                    </div>

                    <div class="col-4">
                        <div class="input-group">
                           
                            <input type="text" class="form-control" id="MontoEfectivo" placeholder="Ingrese el Monto Efectivo" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>

                    

                </div>

                
                

                <div class="row">
               

                    <div class="col-12 ">
                        
                        

                    </div>
              

                </div>


                

                <div class="row ">
                    <div class="col-2">
                            <button type="button" onclick="" class="btn btn-primary">Generar Factura</button>
                    </div>
                </div>
            </div>
           

        </div>

                   

                        

    </div>

   

</main>

    


<?php
include('pie.php'); 
?>