<?php
include("../../conexion.php");
include("../../php/Clientes/cliente.php");

$idcliente = @$_POST["idcliente"];
$clienteactual = new Cliente();
echo json_encode($clienteactual->BuscarClientePorId($idcliente, $mysqli));
















?>