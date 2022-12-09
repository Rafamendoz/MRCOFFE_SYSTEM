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
window.onload = function() {
  ObtenerValores();
  Isv();
  Total();

}

function Preordenar() {
  document.getElementById('mostrar').style.display = 'block';
  document.getElementById('ocultar').style.display = 'none';

}

function Isv() {
  let subtotal = document.getElementById("subtotal").innerHTML;
  let disc = document.getElementById("idLDes").innerHTML;


  // Calculo del subtotal
  let isv = (parseFloat(subtotal) - parseFloat(disc)) * 0.15;
  $("#PIsv").append("<label id=\"idLIsv\">" + isv.toFixed(2));
}

function Total() {
  let subtotal = document.getElementById("subtotal").innerHTML;
  let isv = document.getElementById("idLIsv").innerHTML;
  let disc = document.getElementById("idLDes").innerHTML;



  // Calculo del subtotal
  let total = parseFloat(subtotal) - parseFloat(disc) + parseFloat(isv);
  $("#idLTotal").html(total.toFixed(2));
}

function regresar() {
  window.location.href = "../views/pedidosr.php";
}

function ObtenerValores() {
  var idpedido = "<?php echo $idpedido; ?>";
  const fecha = new Date();
  var idfecha = formatoFecha(fecha, "yy-mm-dd");
  var IdCliente = "<?php echo $ccliente; ?>";
  var nombreCliente = "<?php echo $namec; ?>";
  var subtot = "<?php echo $subtotalF; ?>";


  $.post("../controllers/DetalleP/ObtenerCabeceraPController.php", {
      "idpedido": idpedido,
      "idfecha": idfecha,
      "IdCliente": IdCliente,
      "NombreCliente": nombreCliente
    },
    function(data) {
      var resp = JSON.parse(data);
      console.log(resp);

      $("#idpedido").html(resp.idpedido);
      $("#idCliente").html(resp.idcliente);
      $("#idNCliente").html(resp.nombrecliente);
      $("#idNCliente").html(resp.nombrecliente);
    }
  );

  $("#idTbody").append("<?php echo $html; ?>");
  $("#subtotal").html(parseFloat(subtot).toFixed(2));








}



function formatoFecha(fecha, formato) {
  const map = {
    dd: fecha.getDate(),
    mm: fecha.getMonth() + 1,
    yy: fecha.getFullYear().toString().slice(-2),
    yyyy: fecha.getFullYear()
  }

  return formato.replace(/dd|mm|yy|yyy/gi, matched => map[matched])
}


function Cancelar() {
  Swal.fire({
    title: '¿Esta seguro de continuar?',
    text: "No podra revertir los cambios!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Cancelar orden',
    cancelButtonText: 'Regresar!'
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire({
        icon: 'info',
        title: 'Cancelando Orden',
        html: 'Por favor espere...',
        timer: 2300,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {

          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer');
          Swal.fire(
            'Orden Cancelada!',
            'La orden ha sido cancelada.',
            'success'
          ).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "createorder.php";
            }

          })



        }
      })
    }
  })

}


function GuardarCabezeraPedido() {
  var idpedido = "<?php echo $idpedido; ?>";
  const fecha = new Date();
  var now = fecha.toLocaleTimeString('en-US');
  var idfecha = formatoFecha(fecha, "yy-mm-dd");
  var IdCliente = "<?php echo $ccliente; ?>";
  var nombreCliente = "<?php echo $namec; ?>";
  var totalP = $("#idLTotal").html();
  $.post("../controllers/Pedidos/GuardarPedidoController.php", {
    "idpedido": idpedido,
    "idfecha": idfecha,
    "IdCliente": IdCliente,
    "NombreCliente": nombreCliente,
    "Hora": now,
    "Total": totalP
  }, function(data) {
    var resp = data;
    console.log(resp);


  });
}

function GuardarDetallePedido() {
  let colCount = $("#idTbody tr").length;

  for (var i = 1; i <= colCount; i++) {
    let idpedido = $("#idpedido").text();
    let idproducto = $("#f" + i + "c1").val();
    let cantidad = $("#f" + i + "c3").val();
    let descuento = $("#f" + i + "c4").val();
    let subtotal = $("#f" + i + "c5").val();

    var total = subtotal - descuento;
    /*alert("IDPEDIDO: "+idpedido+ "IDPRODUCTO: "+idproducto+ "CANTIDAD: "+ cantidad+ "DESCUENTO: "+ descuento + "SUBTOTAL: "+subtotal+ " Total: "+ total);*/
    enviar(idpedido, idproducto, cantidad, descuento, subtotal, total);




  }

  function enviar(idpedido, idproducto, cantidad, descuento, subtotal, total) {
    $.post("../controllers/DetalleP/GuardarDetallesController.php", {
        "idpedido": idpedido,
        "idproducto": idproducto,
        "cantidad": cantidad,
        "descuento": descuento,
        "subtotal": subtotal,
        "total": total
      },
      function(data) {
        var res = data;
        console.log(res);


      }
    );


  }

}

function GuardarPedido() {

  Swal.fire({
    title: '¿Esta seguro de continuar?',
    text: "No podra revertir los cambios!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, confirmado!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      let timerInterval
      Swal.fire({

        title: 'Ejecutando Accion',
        html: 'Por favor espere...',
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {

          }, 100)
        },
        willClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below*/
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log('I was closed by the timer')
          GuardarCabezeraPedido();
          GuardarDetallePedido();

          Swal.fire({
            icon: 'success',
            title: 'Resultado Existoso',
            width: 400,
            padding: '1em',
            color: '#454541',
            background: '#fff url(/images/trees.png)',
            backdrop: `
                        rgba(0,28,50,0.5)
                        url('../img/pedido.gif')
                        left bottom
                        no-repeat
                        `
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = "pedidosr.php";


            }
          })
        }
      })


    } else {



    }

  });
}
</script>





<?php
include('pie.php');
?>