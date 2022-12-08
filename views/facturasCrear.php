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
                        <li class="breadcrumb-item " aria-current="page"><a href="facturasVistas.php">Factura</a></li>
                        <li class="breadcrumb-item " aria-current="page">Vista Factura</li>

                    </ol>
                </nav>
            </div>

        </div>


        <div class="px-3 mx-3 mt-3 pb-4 bg-body rounded">
           
                <div class="row">

    

                    
                        

                   
                            <div class="col-7 shadow-lg p-3 mb-0 bg-primary rounded">
                                <div class="fcabera"></div>
                                </br>
                               <p class="p1" style="font-size: 1.4em; color:white;"><b>PRE-FACTURA</b></p>
                              
                            </div>

                            <div class="col-4 shadow-lg p-3 mx-4 mb-2 btn-success rounded-pill ">
                               
                                </br>
                                <p class="p1" style="color: white;"><i class="fa-solid fa-comment-dollar mx-2 fa-xl"></i>SUBTOTAL: <b>L <label>120.00</b></label></p>
                              
                            </div>


                            

                          
                

                    
            
       


          
                </div>

                <div class="row">
                            
                 
                            <div class="col-7 shadow-lg px-3 pb-2 bg-body">
                            <div class="row">
                                    <hr class="hr" />
                                    <div class="col-3 align-self-center">
                                        <p class="p2"><b>RTN Factura:</b></p>
                                    </div>

                                    <div class="col-2 align-self-center">
                                        <p class="p2">08012001042235</p>
                                    </div>

                                    <div class="col-4 align-self-right">
                                        <p class="p2"><b>Fecha Maxima de Emisión:</b></p>
                                    </div>

                                    <div class="col-2 align-self-center" >
                                        <p class="p2">2023-05-25</p>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-3 align-self-center">
                                        <p class="p2"><b>Cai:</b></p>
                                    </div>

                                    <div class="col-5 align-self-center">
                                        <p class="p2">AB45JH-UJ98OL-09PO87-23MNKJ-87YGC6-AA</p>
                                    </div>

                                   
                                    

                                </div>
                                <hr class="hr" />
                                <hr class="hr" />
                                <div class="row">
                                    
                                    <div class="col-3 align-self-center">
                                        <p class="p2"><b>N.Pedido:</b></p>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <p class="p2">11101</p>
                                    </div>

                                    <div class="col-2 align-self-center">
                                        <p class="p2"><b>N. Factura:</b></p>
                                    </div>

                                    <div class="col-4 align-self-center" >
                                        <p class="p2">1111-22344-234222</p>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-3 align-self-center">
                                        <p class="p2"><b>C.Cliente:</b></p>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <p class="p2">11101</p>
                                    </div>

                                    <div class="col-2 align-self-center">
                                        <p class="p2"><b>Nombre:</b></p>
                                    </div>
                                    <br>
                                    </br>
                                   


                                    <div class="col-4 align-self-center" >
                                        <p class="p2">Edwin Rafael Mendoza</p>
                                    </div>
                                    <hr class="hr" />

                                </div>

                                <div class="row">
                                    <div class="col-3 align-self-center">
                                        <p class="p2">Atendido por:</p>
                                    </div>

                                    <div class="col-3 align-self-center">
                                        <p class="p1">Juana la cubana</p>
                                    </div>

                                    <div class="col-2 align-self-center">
                                        <p class="p2">Fecha:</p>
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
                                        <tr>
                                                <td>Cafe Sin Leche</td>
                                                <td>1</td>
                                                <td>12.93</td>
                                                <td>0.00</td>
                                                <td>12.93</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>

                                </div>
                            



                            </div>

                            <div class="col-4  p-3 mx-4 ">
                                <div class="row">
                                    <div class="col-12 shadow-lg p-3 mb-3  btn-primary">
                                        <p class="p1"><i class="fa-solid fa-coins fa-xl mx-2"></i>ISV: L.12.33</p>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 shadow-lg p-3  mb-3 btn-danger">
                                        <p class="p1"><i class="fa-solid fa-percent fa-xl mx-2"></i>Descuento: L.0.00</p>

                                    </div>
                                </div>


                                
                                <div class="row">
                                    <div class="col-12 shadow-lg p-3 btn-light">
                                        <p class="p1"><i class="fa-solid fa-money-bill fa-xl mx-2"></i></i>Total: L<label id="LSubtotal">120.00</label></p>

                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-6  p-3 d-grid gap-2 btn-light">
                                        <button type="button"  class="btn btn-primary"><i class="fa-regular fa-circle-right fa-lg mx-2"></i>Procesar</button>

                                    </div>

                                    <div class="col-6  p-3 d-grid gap-2 btn-light">
                                        <button type="button"  class="btn btn-danger"><i class="fa-solid fa-ban fa-lg mx-2"></i>Cancelar</button>
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