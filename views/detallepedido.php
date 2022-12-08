<?php
include('cabecera.php'); 
include('../conexion.php');
include('../php/DetallePedido/DetallePedido.php');
include('../php/Pedidos/Pedidos.php');

 
        $ccliente=$_POST["IdCliente"];
        $fecha=$_POST["idfecha"];
        $idpedido = $_POST["Idpedido"];
        
        $cabecerap = new Pedido();

        $cabecerap->Constructor($idpedido, 0, $fecha, 0 , $ccliente, 0);
        $arrayDetalle = array();

        $len = $_POST["len"];
        for($i=1; $i<=$len; $i++){
       
          
          $dp = new DetallePedido();
          $dp->Constructor($_POST["Idpedido"],$_POST["f".$i."c1"], $_POST["f".$i."c3"], 0.00, 0.00, 0.00, 0.00);
          array_push($arrayDetalle, $dp);
        }

        print_r( json_encode($arrayDetalle));
        print_r( );

        $json =json_encode($cabecerap);

        

          
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







        <div class="col-7 shadow-lg p-3 mb-0 bg-primary rounded">
          <div class="fcabera"></div>
          </br>
          <p class="p1" style="font-size: 1.4em; color:white;"><b>PRE-FACTURA</b></p>

        </div>

        <div class="col-4 shadow-lg p-3 mx-4 mb-2 btn-success rounded-pill ">

          </br>
          <p class="p1" style="color: white;"><i class="fa-solid fa-comment-dollar mx-2 fa-xl"></i>SUBTOTAL: <b>L
              <label id="subtotal">120.00</b></label></p>

        </div>













      </div>

      <div class="row">


        <div class="col-7 shadow-lg px-3 pb-2 bg-body">
          <div class="row">
            <hr class="hr" />
            <div class="col-3 align-self-center">
              <p class="p2"><b>N.Pedido:</b></p>
            </div>

            <div class="col-3 align-self-center">
              <p class="p2">11101</p>
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



            <div class="col-4 align-self-center">
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

            <div class="col-4 align-self-center">
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
                  <td id="cantidad">1</td>
                  <td id="precio">12.93</td>
                  <td>0.00</td>
                  <td id="subtotal">12.93</td>
                </tr>

              </tbody>
            </table>

          </div>




        </div>

        <div class="col-4  p-3 mx-4 ">
          <div class="row">
            <div class="col-12 shadow-lg p-3 mb-3  btn-primary">
              <p class="p1"><i class="fa-solid fa-coins fa-xl mx-2"></i>ISV: <input type="text"
                  class=" form-control-plaintext border-0 p-0 text-center text-light" name="" id="isv"
                  aria-describedby="helpId" placeholder=""></p>

            </div>
          </div>

          <div class="row">
            <div class="col-12 shadow-lg p-3  mb-3 btn-danger">
              <p class="p1">
                <i class="fa-solid fa-percent fa-xl mx-2"></i>Descuento:<input type="text"
                  class=" form-control-plaintext border-0 p-0 text-center text-light" name="" id="desc"
                  aria-describedby="helpId" placeholder="">


              </p>

            </div>
          </div>



          <div class="row">
            <div class="col-12 shadow-lg p-3 btn-light">
              <p class="p1"><i class="fa-solid fa-money-bill fa-xl mx-2"></i></i>Total: L<label
                  id="total">120.00</label></p>

            </div>
          </div>



          <div class="row">
            <div class="col-6  p-3 d-grid gap-2 btn-light">
              <button type="button" id="ocultar" class="btn btn-primary"><i
                  class="fa-regular fa-circle-right fa-lg mx-2" onclick="mostrar()"></i>Procesar</button>

            </div>

            <div class=" col-6 p-3 d-grid gap-2 btn-light">
              <button type="button" id="ocultar" class="btn btn-danger"><i
                  class="fa-solid fa-ban fa-lg mx-2"></i>Cancelar</button>



            </div>
            <div class="col-6  p-3 d-grid gap-2 btn-light" id="mostrar">
              <select id="mostrar" name="" title="Tipo Pago" class="form-select" style='display:none'
                data-live-search="true">

              </select>



            </div>
            <div class="col-6  p-3 d-grid gap-2 btn-light">
              <button type="button" id="mostrar" class="btn btn-danger" style='display:none'><i
                  class="fa-solid fa-ban fa-lg mx-2"></i>Pagar</button>
              <div class="col-6  p-3 d-grid gap-2 btn-light">


              </div>


            </div>
          </div>




        </div>








      </div>
    </div>







  </div>

</main>
<script src="../js/jquery.min.js"></script>
<!--- Creacion de funciones en javascript--->

<script type="text/javascript">

  
  window.onload=function() {
    ObtenerValores();
		}

  function Total() {
    document.getElementById('mostrar').style.display = 'block';
    document.getElementById('ocultar').style.display = 'none';

  }

  function SubTotal() {
    let precio = document.getElementById("cantidad").value;
    let cant = document.getElementById("precio").value;


    // Calculo del subtotal
    let subtotal = precio * cantidad;
    document.getElementById("subtotal").innerHTML = subtotal;
  }

  function ObtenerValores(){
    var resp = JSON.parse(<?php echo json_encode($cabecerap);?>);
    console.log(resp.idpedido);
    alert("ELL");


  }

</script>



<?php
include('pie.php'); 
?>