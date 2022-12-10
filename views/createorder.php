<?php
include('cabecera.php');

?>

<main>


  <div class=" bd-highlight align-items-center">
    <div class="panelnav " id="panelN">
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

    <div class="bg-dark bg-gradient text-white p-2 mx-3 mt-3 ">
      <p class="p1">Nuevo Pedido</p>
    </div>

    <div class="px-3 bd-highlight ">


      <div class="px-3 shadow mt-3 pb-4 bg-body rounded">
        <form class="row g-3 " method="POST" action="detallepedido.php" id="formularioG">
          <div class="col-md-1 text-center">
            <label for="inputIdPedido" class="form-label">N. Pedido</label>
            <input type="text" class="form-control text-center" name="Idpedido" id="idp" readonly></label>
          </div>



          <div class="col-md-1 text-center">
            <label for="inputPassword4" class="form-label">C. Cliente</label>
            <input type="number" class="form-control" name="IdCliente" id="IdCliente" value="">
          </div>

          <div class="col-md-6 text-center">
            <label for="inputPassword4" class="form-label">Nombre del Cliente</label>
            <input type="text" class="form-control" id="NameC" name="NameC" readonly>
          </div>

          <div class="col-md-3   text-center">
            <label for="inputDate" class="form-label">Fecha</label>
            <input type="text" class="form-control text-center" hidden name="idfecha" id="" readonly
              value="<?php echo date('y-m-d'); ?>">
            <input type="text" class="form-control text-center" id="idFecha" readonly
              value="<?php echo date('d-m-y'); ?>">
          </div>


          <div class="col-md-1 text-center align-items-center">
            <div class="m-3" id="ContenedorIcon">


            </div>



          </div>










          <hr class="hr" />

          <div class="row mb-0">
            <div class="col-1 text-center">
              <label for="" class="form-label">Codigo Producto</label>
            </div>

            <div class="col-4">
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-brands fa-product-hunt"></i></span>
                <input type="text" class="form-control" id="idproducto" placeholder="Ingrese el codigo del producto"
                  aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>

            <div class="col-3 text-center">
              <button type="button" class="btn btn-outline-warning" id="idBotonBuscar"
                onclick="BuscarProductoPorId()"><i class="fa-solid fa-magnifying-glass me-1"></i>Buscar</button>
              <button type="button" class="btn btn-outline-dark" id="idBotonAgregar" onclick="AgregarToOrden()"
                disabled><i class="fa-solid fa-circle-plus me-1"></i>Agregar</button>


            </div>

            <div class="col-1 text-center">
              <label for="totalp">Total Productos</label>
            </div>

            <div class="col-2">
              <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-list-check"></i></span>
                <input type="number" value="" id="idTotalProductos" class="form-control text-center"
                  aria-label="Username" aria-describedby="basic-addon1" readonly>
              </div>

            </div>





          </div>

          <hr class="hr" />


          <div class="row">
            <div class="col-1   align-self-center text-center">
              <i class="fa-solid fa-circle-info fa-xl"></i>
            </div>
            <div class="col-2 align-self-center text-center">
              <label for="labelNameProduct" class="text-center">Nombre del Producto</label>
            </div>
            <div class="col-4">
              <input type="text" class="form-control text-center" id="idNombreProducto" value="" readonly></input>
            </div>

            <div class="col-1 align-self-center ">
              <label for="labelNameProduct">Cantidad</label>
            </div>

            <div class="col-1 ">
              <input type="number" class="form-control text-center" min="1" pattern="[0-3]" id="idCantidad"></input>
            </div>

            <div class="col-3  align-self-center  ">
              <label for="labelProductInf" class="text-center"><b>| Product Information</label>
            </div>


          </div>



          <hr class="hr mb-1" />


          <div class="row">


            <div class="col-12 ">

              <table class="table table-striped text-center align-content-center" id="idTablaDetalle">

                <thead>

                  <th>Codigo</td>
                  <th>Nombre del Producto</td>
                  <th>Cantidad</td>
                  <th>Precio</td>
                  <th>Subtotal</td>
                  <th>Accion</td>

                </thead>

                <tbody class="text-center" id="idTbody">

                </tbody>

              </table>

            </div>


          </div>




          <div class="row ">
            <div class="col-2">
              <button type="button" id="IdGenerar" onclick="GoResumen()" class="btn btn-warning">Generar
                PreOrden</button>
            </div>
          </div>

        </form>
      </div>


    </div>





  </div>



</main>

<script>
  const codigos = [];
  var contador2 = 0;

  var inputCliente = document.getElementById("IdCliente");
  inputCliente.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
      BuscarClientePorId();
      event.preventDefault();

    }
  });

  window.onload = function() {
    ObtenerUltimoIdPedido();
  }





  function GoResumen() {
    if (validar() == true) {
      CrearListaProductos();
    }


  }



  function AgregarProducto() {
    $listaProducto = array();

  }


  function BuscarClientePorId() {
    Vitacora(7,"EL USUARIO PRESIONO EL ENTER PARA BUSCAR UN USUARIO", GetIdUser(), 1, hora(), fecha() );
    $("#IdCliente").prop('disabled', true);
    var idcliente = document.getElementById("IdCliente").value;
    $.post("../controllers/Clientes/BuscarClienteController.php", {
        "idcliente": idcliente
      },
      function(data) {
        var resp = JSON.parse(data);
        var x = Object.keys(resp).length;
        if (x == 2) {
          $("#NameC").val("");

          $(document).ready(function() {
            $("#panelN").after("<div class=\"alert alert-danger mx-3\" id=\"AlertaPanel\" role=\"alert\">" +
              "No se encontro el cliente!</div>");

            $("#ContenedorIcon").empty();
            setTimeout(function() {

              $("#AlertaPanel").remove();
              $("#IdCliente").prop('disabled', false);
            }, 1000);


          });




        } else {
          console.log(resp);
          $("#NameC").val(resp.nombre + " " + resp.apellido);
          $("#IdCliente").prop('disabled', false);

    

          $("#ContenedorIcon").empty();

          if (resp.idgenero == 1) {


            $("#ContenedorIcon").append("<i class=\"fa-solid fa-user-tie fa-3x\"></i>");



          } else {

            $("#ContenedorIcon").append("<i class=\"fa-solid fa-person-dress fa-3x\"></i>");
          }


        }

      }





    );
  }

  function ObtenerUltimoIdPedido() {
    $.post("../controllers/Pedidos/BuscarIdPedidoDisponible.php", {
        "idcliente": 2
      },
      function(data) {
        var resp = JSON.parse(data);
        console.log(resp);
        $("#idp").val(resp);
      }
    );

  }

  function BuscarProductoPorId() {
    Vitacora(7,"EL USUARIO PRESIONO EL BOTON BUSCAR PARA BUSCAR UN PRODUCTO", GetIdUser(), 1, hora(), fecha() );
    $("#idBotonBuscar").prop('disabled', true);
    var idproducto = $("#idproducto").val();

    $.post("../controllers/Productos/BuscarProductoPorIdController.php", {
        "idproducto": idproducto
      },
      function(data) {
        var resp = JSON.parse(data);
        console.log(resp);
        var x = Object.keys(resp).length;
        if (x == 2) {

          $(document).ready(function() {
            $("#panelN").after("<div class=\"alert alert-danger mx-3\" id=\"AlertaPanel\" role=\"alert\">" +
              "No se encontro el producto!</div>");


            setTimeout(function() {
              $("#idNombreProducto").val();
              $("#AlertaPanel").remove();
              $("#idBotonBuscar").prop('disabled', false);
            }, 1500);


          });
        } else {
          $("#idNombreProducto").val(resp.descripcion);
          $("#idBotonBuscar").prop('disabled', false);
          $("#idBotonAgregar").prop('disabled', false);

        }

      }
    );
  }


  function AgregarToOrden() {
    Vitacora(7,"EL USUARIO PRESIONO EL BOTON AGREGAR", GetIdUser(), 7, hora(), fecha() );
    $("#idBotonAgregar").prop('disabled', true);
    var idproducto = $("#idproducto").val();
    var cantidad = $("#idCantidad").val();



    $.post("../controllers/Productos/BuscarProductoPorIdController.php", {
        "idproducto": idproducto
      },
      function(data) {
        var resp = JSON.parse(data);
        var idfila = resp.codigo;
        var idcolumna = idfila + "c"
        var idcolcantidad = idfila + "cantidad"
        var validador = "";
        var contador = 0;
        var subtotal = cantidad * resp.precio;





        $("#" + idcolumna).each(function() {
          validador = $(this).text();
        });

        if (idfila != validador) {
          contador2 = contador2 + 1;
          var html = "<tr id=" + idfila + " scope=\"row\" data-id=\"f" + contador2 + "\"><td id=" + idcolumna +
            "><input hidden name=\"f" + contador2 + "c1\" value=" + resp.codigo + ">" + resp.codigo + "</td>" +
            "<td class=\"nombre\"><input hidden name=\"f" + contador2 + "c2\" value=" + resp.descripcion + "/>" + resp
            .descripcion + "</td>" +
            "<td class =\"cantidad\" >  <input hidden class=\"idcolumacantidad\" name=\"f" + contador2 + "c3\" value=" +
            cantidad + ">" + cantidad + "</td>" +
            "<td class =\"precio\"> <input hidden name=\"f" + contador2 + "c4\" value=" + resp.precio + ">" + resp
            .precio + "</td>" +
            "<td><input hidden name=\"f" + contador2 + "c5\" value=" + subtotal + ">" + subtotal + "</td>" +
            "<td><button onclick=\"EliminarFromOrder(" + idfila +
            ")\" type=\"button\" class=\"btn btn-outline-dark\"><i class=\"fa-solid fa-trash\"></i></button>" +
            "</td></tr>";
          $("#idTbody").append(html);

          $(".idcolumacantidad").each(function() {
            contador = contador + parseInt($(this).val());

          });

          $("#idTotalProductos").val(contador);


        } else {
          $("#panelN").after("<div class=\"alert alert-danger mx-3\" id=\"AlertaPanel\" role=\"alert\">" +
            "Ya hay producto seleccionado con este codigo, para modificarlo elimine el actual!</div>");
          $("#idBotonAgregar").prop('disabled', true);
          setTimeout(function() {

            $("#AlertaPanel").remove();
            $("#idBotonAgregar").prop('disabled', false);
          }, 1500);
        }







      }
    );

  }


  function EliminarFromOrder(idfila) {
    Vitacora(7,"EL USUARIO PRESIONO EL BOTON ELIMINAR", GetIdUser(), 7, hora(), fecha() );


    $("#" + idfila + "").remove();


  }

  function validar() {
    Vitacora(7,"EL USUARIO PRESIONO EL BOTON GENERAR PREORDEN", GetIdUser(), 7, hora(), fecha() );
    var estado = true;
    var rowCount = $("#idTablaDetalle tr").length - 1;
    if (rowCount == 0) {
      $("#panelN").after("<div class=\"alert alert-danger mx-3\" id=\"AlertaPanel\" role=\"alert\">" +
        "No ha agregado ningun producto a la orden!</div>");

      setTimeout(function() {

        $("#AlertaPanel").remove();

      }, 1500);
      estado = false;
    }

    if ($('#idp').val() == "") {
      estado = false;
      $("#panelN").after("<div class=\"alert alert-danger mx-3\" id=\"AlertaPanel\" role=\"alert\">" +
        "No hay pedidos disponibles, comunicarse con el Administrador!</div>");

      setTimeout(function() {

        $("#AlertaPanel").remove();

      }, 1500);
    }

    if ($('#IdCliente').val() == "" || $('#NameC').val() == "") {
      estado = false;
      $("#panelN").after("<div class=\"alert alert-danger mx-3\" id=\"AlertaPanel\" role=\"alert\">" +
        "No ha ingresado el cliente!</div>");

      setTimeout(function() {

        $("#AlertaPanel").remove();

      }, 1500);
    }

    if ($('#idFecha').val() == "") {
      estado = false;
      $("#panelN").after("<div class=\"alert alert-danger mx-3\" id=\"AlertaPanel\" role=\"alert\">" +
        "No ha ingresado la fecha!</div>");

      setTimeout(function() {

        $("#AlertaPanel").remove();

      }, 1500);

    }



    return estado;

  }



  function CrearListaProductos() {
    var rowCount = $("#idTablaDetalle tr").length - 1;
    $("#formularioG").append("<input hidden name=\"len\" value=" + rowCount + ">");

    $("#formularioG").submit();

  }

  function hora(){
    const fecha = new Date();
    var now = fecha.toLocaleTimeString('en-GB');
    return now;
  }

  function fecha(){
    const fecha = new Date();
    var idfecha = formatoFecha(fecha, "yy-mm-dd");
    return idfecha;
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

  function GetIdUser(){
    let idusuario = "<?php echo $_SESSION['iduser']; ?>";
    return idusuario;
  }


  function Vitacora(modulo, descripcion, usuarioResponsable, accion, hora, fecha){
    $.post("../controllers/Vitacora/InsertarItemVitacoraController.php",
    {"modulo":modulo,"descripcion":descripcion, "usuarioResponsable":usuarioResponsable, "accion":accion, "hora":hora, "fecha":fecha}, 
    function(data)
    {
      var resp = JSON.parse(data);
      console.log(resp);

    });

  }

  
</script>


<?php
include('pie.php');
?>