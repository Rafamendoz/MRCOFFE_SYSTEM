<?php
include('cabecera.php');

?>
<?php
include('../conexion.php');
$idpedido = $_GET["idpedido"];
$query = "SELECT *
    FROM detallepedido WHERE idpedido=".$idpedido;

$detalle = mysqli_query($mysqli, $query);
?>
<main>
  <div class=" bd-highlight align-items-center">
    <div class="panelnav">
      <div class="shadow p-3 mb-1 bg-body rounded">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb cabecerap">
            <li class="breadcrumb-item" aria-current="page">Panel Principal</li>
            <li class="breadcrumb-item " aria-current="page">Pedidos</li>
            <li class="breadcrumb-item  " aria-current="page"><a href="pedidosr.php">Pedidos Realizados</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detalle de Pedido</li>


          </ol>
        </nav>
      </div>

    </div>



    <div class="bg-dark bg-gradient text-white p-2 mx-3 mt-3 ">
      <p class="p1">Detalle de Pedidos</p>
    </div>

    <div class="px-3 mx-3  pb-4 bg-body shadow rounded">




      <div class="row">
        <div class="col-12">
          <table class="table text-center" id="Tabla">

          </table>
        </div>

      </div>

    </div>
  </div>





</main>
<script src="../js/jquery.min.js"></script>


<script>
(function() {
  Obtenerdetalle();
})();

function Obtenerdetalle() {
  var idpedido = "<?php echo $idpedido; ?>";
  $.post(
    "../controllers/DetalleP/MostrardetallePedido.php", {"idpedido":idpedido},
    function(data) {

      var resp = JSON.parse(data);
      console.log(resp);
      var html = "";
      var basehtml =
        "<tr>" +
        " <th>Codigo Pedido</th>" +
        "<th>Producto</th>" +
        "<th>Cantidad</th>" +
        "<th>Descuento</th>" +
        "<th>SubTotal</th>" +
        "<th>Total</th>" +
        "</tr>";


      for (var i in resp) {

        html = html + "<tr><td>" + resp[i].idpedido + "</td>" +
          "<td>" + resp[i].idproducto + "</td>" +
          "<td>" + resp[i].cantidad + "</td>" +
          "<td> <input hidden type=\"text\" value=\"1\"></input>" + resp[i].descuento + "</td>" +
          "<td>" + resp[i].subtotal + "</td>" +
          "<td>" + resp[i].total + "</td>" +
          "<td>" +
          "</td></tr>";


      }

      var finalhtml = basehtml + html;

      document.getElementById("Tabla").innerHTML = finalhtml;







    }
  );
}
</script>


<?php
include('pie.php');
?>