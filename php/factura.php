<?php 

include("../Respuesta.php");

class Factura{

    public $codigoFactura;
    public $fechaactual;
    public $idpedido;
    public $idcliente;
    public $nombrecliente;
    public $nombreempleado;

    public $rtnfactura;
    public $cai;
    public $fechaVencimiento;
    
    public $productodescrip;
    public $cantidad;
    public $precio;
    public $descuento;
    public $subtotal;
    public $isv;
    public $total;


    function Constructor($codigoFactura, $fechaactual, $idpedido, $idcliente, $nombrecliente, $nombreempleado, $rtnfactura, $cai, $fechaVencimiento, 
    $productodescrip, $cantidad, $precio,$descuento, $subtotal, $isv, $total){
        
        $this-> $codigoFactura = $codigoFactura; 
        $this-> $fechaactual = $fechaactual;
        $this-> $idpedido = $idpedido;
        $this-> $idcliente = $idcliente;
        $this-> $nombrecliente = $nombrecliente;
        $this-> $nombreempleado =$nombreempleado;
        $this-> $rtnfactura = $rtnfactura;
        $this-> $cai = $cai;
        $this-> $fechaVencimiento = $fechaVencimiento;
        $this-> $productodescrip = $productodescrip;
        $this-> $cantidad = $cantidad;
        $this-> $precio = $precio;
        $this-> $descuento = $descuento;
        $this-> $subtotal = $subtotal;
        $this-> $isv = $isv;
        $this-> $total = $total;
    }

}
    

?>