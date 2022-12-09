<?php
include('cabecera.php');
include('../conexion.php');
include('../php/Pedidos/pedidos.php');

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
            <li class="breadcrumb-item " aria-current="page"><a href="pedidos.php">Pedidos</a> </li>
            <li class="breadcrumb-item active" aria-current="page">Pedidos Realizados</li>

          </ol>
        </nav>
      </div>

    </div>


    <div class="bg-dark bg-gradient text-white p-2 mx-3 mt-3 ">
      <p class="p1">Pedidos Realizados</p>
    </div>

    <div class="px-3 mx-3  pb-4 bg-body shadow rounded">




      <div class="row">
        <div class="col-12">
          <table class="table text-center" id="TablaPedidosR">

          </table>
        </div>

      </div>

    </div>
  </div>



</main>

<script src="../js/jquery.min.js"></script>


<script>
(function() {
  ObtenerPedidosRealizados();
})();



function ObtenerPedidosRealizados() {
  $.post(
    "../controllers/Pedidos/BuscarPedidosR.php", {},
    function(data) {

      var resp = JSON.parse(data);
      console.log(resp);
      var html = "";
      var basehtml =
        "<tr>" +
        " <th>Codigo Pedido</th>" +
        "<th>Codigo Cliente</th>" +
        "<th>Nombre del Cliente</th>" +
        "<th>Atendido por</th>" +
        "<th>Total</th>" +
        "<th>Accion</th>" +
        "</tr>";


      for (var i in resp) {

        html = html + "<tr><td>" + resp[i].idpedido + "</td>" +
          "<td>" + resp[i].idcliente + "</td>" +
          "<td>" + resp[i].nombrecliente + "</td>" +
          "<td> <input hidden type=\"text\" value=\"1\"></input>" + resp[i].nombreempleado + "</td>" +
          "<td>" + resp[i].total + "</td>" +
          "<td>" +
          "<a href=\"../views/detallesf.php?" + resp[i].idpedido +
          "\" class=\"edit-form-data\" data-toggle=\"modal\" data-target=\"#editMdl\">" +
          "<i class=\"fa-solid fa-eye\"></i></a>" +
          "<a href=\"\" class=\"edit-form-data px-2\" data-toggle=\"modal\" data-target=\"#editMdl\">" +
          "<i class=\"far fa-trash-alt\"></i></a>" +
          "</td></tr>";


      }

      var finalhtml = basehtml + html;

      document.getElementById("TablaPedidosR").innerHTML = finalhtml;







    }
  );
}
</script>





<?php
include('pie.php');
?>