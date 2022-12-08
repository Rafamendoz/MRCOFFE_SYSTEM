<?php 

include("../Respuesta.php");

class Factura{

    public $idfactura;
    public $idpedido;
    public $fecha;
    public $total;


    function Constructor($idfactura, $idpedido, $fecha, $total){
        $this->idfactura = $idfactura;
        $this->idpedido = $idpedido;
        $this->fecha = $fecha;
        $this->total = $total;

    }


    
    function BuscarFacturaPorId($id,$conexion){
        $respuestafactura = new Respuesta();
        $query = "SELECT * FROM facturas WHERE codigoFactura=".$id.";";
        $result = mysqli_query($conexion, $query);
        if(mysqli_num_rows($result)==0){
            $respuestafactura->NoExiste("No existe el registro");
            return $respuestafactura;

        }else{

            while ($row = mysqli_fetch_array($result)){
                $factura = new Factura();
                $factura->Constructor($row[0], $row[1], $row[2], $row[3]);
            
    
            }
            return $factura;

        }
     
    }


}













?>