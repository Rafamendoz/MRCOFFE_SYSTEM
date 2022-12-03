<?php
include('cabecera.php'); 
include('../conexion.php');

 /*$idpedido = $_GET["Idpedido"];

 $query = "SELECT MAX(idpedido) as idpedi FROM pedido";
 $result = mysqli_query($mysqli,$query);
 $pedidon=0;
 while ($row = mysqli_fetch_array($result))
        {
          $pedidon = $row['idpedi']+1;
      
        }*/

 

?>


<main>


    <div class=" bd-highlight align-items-center">
        <div class="panelnav">
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


        <div class="px-3 mx-3 mt-3 pb-4 bg-body rounded">
           
                <div class="row">

    

                    
                        

                   
                            <div class="col-7 shadow-lg p-3 mb-0 bg-warning rounded">
                                <div class="fcabera"></div>
                                </br>
                               <p><b>PRE-FACTURA</b></p>
                              
                            </div>

                            <div class="col-4 shadow-lg p-3 mx-4 mb-2 bg-success rounded-pill ">
                               
                                </br>
                                <p style="color: white;"><b> <i class="fa-solid fa-comment-dollar mx-2 fa-xl"></i>SUBTOTAL</b></p>
                              
                            </div>


                            

                          
                

                    
            
       


          
                </div>

                <div class="row">
                            
                 
                            <div class="col-7 shadow-lg px-3 pb-2 bg-body">
                                <div class="row">
                                    <hr class="hr" />
                                    <div class="col-3 align-self-center">
                                        <p class="p1"><b>N.Pedido:</b></p>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <p class="p1">11101</p>
                                    </div>

                                    <div class="col-2 align-self-center">
                                        <p class="p1"><b>N. Factura:</b></p>
                                    </div>

                                    <div class="col-4 align-self-center" >
                                        <p class="p1">1111-22344-234222</p>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-3 align-self-center">
                                        <p class="p1"><b>C.Cliente:</b></p>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <p class="p1">11101</p>
                                    </div>

                                    <div class="col-2 align-self-center">
                                        <p class="p1"><b>Nombre:</b></p>
                                    </div>
                                    <br>
                                    </br>
                                   


                                    <div class="col-4 align-self-center" >
                                        <p class="p1">Edwin Rafael Mendoza</p>
                                    </div>
                                    <hr class="hr" />

                                </div>

                                <div class="row">
                                    <div class="col-3 align-self-center">
                                        <p class="p1">Atendido por:</p>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <p class="p1">Juana la cubana</p>
                                    </div>

                                    <div class="col-2 align-self-center">
                                        <p class="p1">Fecha:</p>
                                    </div>

                                    <div class="col-4 align-self-center" >
                                        <p class="p1"><?php 
                                        $fechaActual = date('d/m/y');
                                        echo $fechaActual;?></p>
                                    </div>
                                    <br>
                                    <br>
                                    </br>
                                    
                                    <hr class="hr">

                                </div>

                                <div class="row">
                                    <table class="table  table-striped text-center align-content-center">
                                        <thead>
                                            <tr>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Descuento</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            
                                        </tbody>
                                    </table>

                                </div>
                            



                            </div>

                            <div class="col-4  p-3 mx-4 ">
                                <div class="row">
                                    <div class="col-12 shadow-lg p-3 mb-3  btn-primary">
                                        <p><i class="fa-solid fa-coins fa-xl mx-2"></i>ISV: L.12.33</p>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 shadow-lg p-3  mb-3 btn-outline-danger">
                                        <p>Descuento: L.0.00</p>

                                    </div>
                                </div>


                                
                                <div class="row">
                                    <div class="col-12 shadow-lg p-3  bg-body">
                                        <p>Total</p>

                                    </div>
                                </div>

                              
                               
                              
                            </div>



              




                </div>
        </div>


       
                   

                        

    </div>

</main>




<?php
include('pie.php'); 
?>