<?php

include('../../php/Pedidos/Pedidos.php');


    $ccliente=@$_POST["IdCliente"];
    $fecha=@$_POST["idfecha"];
    $idpedido = @$_POST["idpedido"];

    $pedidoanew = new Pedido();
    $pedidoanew->Constructor($idpedido, 0, $fecha, 0 , $ccliente, 0);
    echo json_encode($pedidoanew);















?>