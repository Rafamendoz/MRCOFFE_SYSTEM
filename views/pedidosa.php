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
                        <li class="breadcrumb-item " aria-current="page"><a href="pedidos.php">Pedidos</a> </li>
                        <li class="breadcrumb-item active" aria-current="page">Pedidos Anulados</li>
                   
                    </ol>
                </nav>
            </div>

        </div>


        <div class="bg-dark bg-gradient text-white p-2 mx-3 mt-3 ">
                <p class="p1">Pedidos Anulados</p>
        </div>
            
        <div class="px-3 mx-3  pb-4 bg-body shadow rounded">

           
            

            <div class="row">
                <div class="col-12">
                  <table class="table text-center" id="idtbody">
                    <thead>
                        <tr>
                            <th>Codigo Pedido</th>
                            <th>Codigo Cliente</th>
                            <th>Nombre del Cliente</th>
                            <th>Atendido por</th>
                            <th>Total</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody id="">
                        <tr>
                            <td>12342</td>
                            <td>3534</td>
                            <td>Edwin Rafael Espino</td>
                            <td>Juana La Cuabana</td>
                            <td>123.45</td>
                            <th><a href="#">Ver detalle</a></th>
                        </tr>

                    </tbody>
                  </table>
                </div>
               
            </div>
   
        </div>
</div>



</main>

<script src="../js/jquery.min.js"></script>
<script>

(function() {
    ObtenerPedidosAnulados();
})();

    
function ObtenerPedidosAnulados() {
  $.post(
    "../controllers/Pedidos/BuscarPedidosAnulados.php", {},
    function(data) {

      var resp =JSON.parse(data);
      console.log(resp);
      var html = "";
      var basehtml =
        "<tr>" +
        " <th>Codigo Pedido</th>" +
        "<th>Codigo Cliente</th>" +
        "<th>Nombre del Cliente</th>" +
        "<th>Atendido por</th>" +
        "<th>Total</th>" +
        "</tr>";


      for (var i in resp) {

        html = html + "<tr><td>" + resp[i].idpedido + "</td>" +
          "<td>" + resp[i].idcliente + "</td>" +
          "<td>" + resp[i].nombrecliente + "</td>" +
          "<td> <input hidden type=\"text\" value=\"1\"></input>" + resp[i].nombreempleado + "</td>" +
          "<td>" + resp[i].total + "</td>" +
          "</tr>";


      }

      var finalhtml = basehtml + html;

      document.getElementById("idtbody").innerHTML = finalhtml;







    }
  );
}
</script>



<?php
include('pie.php'); 
?>
