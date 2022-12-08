<?php 

include("../Respuesta.php");

class Cliente{

    public $idcliente;
    public $nombre;
    public $apellido;
    public $direccion;
    public $telefono;
    public $correo;
    public $identidad;


    function Constructor($idcliente, $nombre, $apellido, $direccion, $telefono, $correo, $identidad){
        $this->idcliente = $idcliente;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->identidad = $identidad;

    }






    function BuscarCliente($conexion){
        $query = "SELECT * FROM cliente";
        $listCliente = array();
        $result = mysqli_query($conexion, $query);
        while ($row = mysqli_fetch_array($result)){
            $cliente = new Cliente();
            $cliente->Constructor($row[0], $row[1], $row[2], $row[3], $row[4], $row[5],$row[6]);
            $listCliente[] = $pedido;

        }
        return $listCliente;
    }


    
    function BuscarClientePorId($id,$conexion){
        $respuestaCliente = new Respuesta();
        $query = "SELECT * FROM cliente WHERE idcliente=".$id.";";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result)==0){
            $respuestaCliente->NoExiste("No existe el registro");
            return $respuestaCliente;

        }else{

            while ($row = mysqli_fetch_array($result)){
                $cliente = new Cliente();
                $cliente->Constructor($row[0], $row[1], $row[2], $row[3], $row[4], $row[5],$row[6]);
            
    
            }
            return $cliente;

        }
     
    }


}













?>