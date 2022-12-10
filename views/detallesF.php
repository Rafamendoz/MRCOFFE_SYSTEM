<?php
include('cabecera.php');

include('../php/DetallePedido/DetallePedido.php');
include('../php/Pedidos/Pedidos.php');





/*$arrayDetalle = array();
$html = "";
$len = $_POST["len"];
for ($i = 1; $i <= $len; $i++) {
  $productcode = $_POST["f" . $i . "c1"];
  $descripcion = $_POST["f" . $i . "c2"];
  $preciode = $_POST["f" . $i . "c3"];
  $quanty = $_POST["f" . $i . "c4"];
  $descuento = 0.00;
  $subtot = $_POST["f" . $i . "c5"] - $descuento;

  $subtotalF = $subtotalF + $subtot;
  $html = $html .
    "<tr><td><input hidden id='f$i" . "c1" . "' value='$productcode'></input>$descripcion</td> <td><input hidden id='f$i" . "c2" . "' value='$quanty'></input>$quanty</td><td><input hidden id='f$i" . "c3" . "' value='$preciode'></input>$preciode</td><td><input hidden id='f$i" . "c4" . "' value='$descuento'></input>0.00</td><td><input hidden id='f$i" . "c5" . "' value='$subtot'></input>$subtot</td></tr>";
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







        <div class="col-7 shadow-lg p-3 mb-0 bg-primary rounded">
          <div class="fcabera"></div>
          </br>
          <p class="p1" style="font-size: 1.4em; color:white;"><b>Detalle de Pedido</b></p>

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
              <p class="p2" id="idpedido"></p>
            </div>


          </div>

          <div class="row">
            <div class="col-3 align-self-center">
              <p class="p2"><b>RTN:</b></p>
            </div>

            <div class="col-3 align-self-center">
              <p class="p2" id="idCliente">11101</p>
            </div>

            <div class="col-2 align-self-center">
              <p class="p2"><b>Nombre:</b></p>
            </div>
            <br>
            </br>



            <div class="col-4 align-self-center">
              <p class="p2" id="idNCliente">Edwin Rafael Mendoza</p>
            </div>
            <hr class="hr" />

          </div>

          <div class="row">
            <div class="col-3 align-self-center">
              <p class="p2">Atendido por:</p>
            </div>

            <div class="col-3 align-self-center">
              <p class="p1"><?php echo $_SESSION['User']; ?></p>
            </div>

            <div class="col-2 align-self-center">
              <p class="p2">Fecha:</p>
            </div>

            <div class="col-4 align-self-center">
              <p class="p1"><?php
                            $fechaActual = date('d-m-Y');
                            echo date("d-m-Y", strtotime($fechaActual . "- 1 days"));
                            ?></p>
            </div>
            <br>
            <br>
            </br>

            <hr class="hr">

          </div>

          <div class="row">
            <table class="table  table-striped text-center align-content-center" id="idTDetalle">
              <thead>
                <tr>
                  <th>Descripcion</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Descuento</th>
                  <th>Subtotal</th>
                </tr>
              </thead>

              <tbody id="idTbody">


              </tbody>
            </table>

          </div>




        </div>

        <div class="col-4  p-3 mx-4 ">
          <div class="row">
            <div class="col-12 shadow-lg p-3 mb-3  btn-primary">
              <p class="p1" id="PIsv"><i class="fa-solid fa-coins fa-xl mx-2"></i>ISV: L </p>

            </div>
          </div>

          <div class="row">
            <div class="col-12 shadow-lg p-3  mb-3 btn-danger">
              <p class="p1">
                <i class="fa-solid fa-percent fa-xl mx-2"></i>Descuento: L. <label id="idLDes">0.00</label>


              </p>

            </div>
          </div>



          <div class="row">
            <div class="col-12 shadow-lg p-3 btn-light">
              <p class="p1" id="PTotal"><i class="fa-solid fa-money-bill fa-xl mx-2"></i></i>Total: L <label
                  id="idLTotal">0.00</label></p>

            </div>
          </div>



          <div class="row">
            <div class="col-6  p-3 d-grid gap-2 btn-light">
              <button type="button" id="ocultar" class="btn btn-primary" onclick="regresar()"><i
                  class="fa-regular fa-circle-right fa-lg mx-2"></i>Regresar</button>

            </div>

            <div class=" col-6 p-3 d-grid gap-2 btn-light">
              <button type="button" id="ocultar" onclick="Cancelar()" class="btn btn-danger"><i
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

</script>





<?php
include('pie.php');
?>