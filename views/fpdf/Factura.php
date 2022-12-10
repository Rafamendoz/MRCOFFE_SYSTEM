<?php

require('./fpdf.php');
include("../../conexion.php"); //llamamos a la conexion BD

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

$queryInfoFacrura = "
SELECT 
fecha ,
pf.rtn,
pf.fechavencimiento,
pf.cai,
pf.rangoinicial,
pf.rangofinal,
CONCAT( e.nombre , ' ', e.apellido ) as nombreempleado,
CONCAT( c.nombre , ' ', c.apellido ) as nombrecliente,
f.idpedido,
f.codigofactura,f.subtotal,f.isv,
f.total



FROM 
facturas f 
join pedido p 
on  f.idpedido = p.idpedido 
join parametrizacion_facturas pf 
on f.id_parametro = pf.id_parametro 
join empleados e 
on p.idempleados = e.idempleados 
JOIN cliente c 
on p.idcliente  = c.idcliente 
where f.codigoFactura = 

" . $id;
$informacion_consulta = $mysqli->query($queryInfoFacrura);
$informacion = $informacion_consulta->fetch_object();



class PDF extends FPDF
{

    // Cabecera de página
    function Header()
    {
        include("../../conexion.php"); //llamamos a la conexion BD


        include("../../conexion.php"); //llamamos a la conexion BD

        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
        }

        $queryInfoFacrura = "
        SELECT 
        fecha ,
        pf.rtn,
        pf.fechavencimiento,
        pf.cai,
        pf.rangoinicial,
        pf.rangofinal,
        CONCAT( e.nombre , ' ', e.apellido ) as nombreempleado,
        CONCAT( c.nombre , ' ', c.apellido ) as nombrecliente,
        f.idpedido,
        f.codigofactura
        
        
        
        FROM 
        facturas f 
        join pedido p 
        on  f.idpedido = p.idpedido 
        join parametrizacion_facturas pf 
        on f.id_parametro = pf.id_parametro 
        join empleados e 
        on p.idempleados = e.idempleados 
        JOIN cliente c 
        on p.idcliente  = c.idcliente 
        where f.codigoFactura = 
        
        " . $id;
        $informacion_consulta = $mysqli->query($queryInfoFacrura);
        $informacion = $informacion_consulta->fetch_object();




        //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
        //$dato_info = $consulta_info->fetch_object();
        $this->Image('logo.png', 250, 2, 40); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
        $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(95); // Movernos a la derecha
        $this->SetTextColor(0, 0, 0); //color
        //creamos una celda o fila

        $this->SetFont('Arial', 'B', 15);
        $this->Cell(100, 10, utf8_decode("FACTURA"), 0, 1, 'C', 0);
        $this->Ln(3);





        $this->Cell(110, 15, utf8_decode('Mr Coffee'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
        $this->Ln(3); // Salto de línea
        $this->SetTextColor(103); //color


        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(96, 10, utf8_decode("RTN : " . $informacion->rtn), 0, 0, '', 0);
        $this->Ln(5);


        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(59, 10, utf8_decode("Fecha Vencimiento : " . $informacion->fechavencimiento), 0, 0, '', 0);
        $this->Ln(5);


        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("CAI : " . $informacion->cai), 0, 0, '', 0);
        $this->Ln(5);


        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Rango Incial : " . $informacion->rangoinicial), 0, 0, '', 0);
        $this->Ln(10);


        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 0, utf8_decode("Rango Final : " . $informacion->rangofinal), 0, 0, '', 0);
        $this->Ln(10);

        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Atendido por : " . $informacion->nombreempleado), 0, 0, '', 0);
        $this->Ln(10);

        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 0, utf8_decode("Cliente : " . $informacion->nombrecliente), 0, 0, '', 0);
        $this->Ln(10);

        $this->Cell(10);  // mover a la derecha
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(85, 0, utf8_decode("No Factura : " . $informacion->codigofactura), 0, 0, '', 0);
        $this->Ln(10);

        //color
    
        /* CAMPOS DE LA TABLA */
        //color
        $this->SetFillColor(228, 161, 27); //colorFondo
        $this->SetTextColor(0, 0, 0); //colorTexto
        $this->SetDrawColor(0, 0, 0); //colorBorde
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(12);
        $this->Cell(50, 10, utf8_decode('PRODUCTO'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('PRECIO'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('CANTIDAD'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('DESCUENTO'), 1, 0, 'C', 1);
        $this->Cell(50, 10, utf8_decode('SUBTOTAL'), 1, 0, 'C', 1);

    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

        $this->SetY(-15); // Posición: a 1,5 cm del final
        $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
        $hoy = date('d/m/Y');
        $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
    }
}

/* CONSULTA INFORMACION DEL HOSPEDAJE */
include("../../conexion.php"); //llamamos a la conexion BD
$query = " 
SELECT * from detallepedido d 

join producto p 
on d.idproducto = p.idproducto
where d.idpedido =
" . $informacion->idpedido;
$consulta_info = $mysqli->query($query);

//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aquí entran dos para parámetros (orientación,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$pdf->Cell(40, 10, utf8_decode(""), 0, 1 , 'C', 0); //salto de linea
/*$consulta_reporte_alquiler = $conexion->query("  ");*/

while ($row = $consulta_info->fetch_object()) {
    $i = $i + 1;
    /* TABLA */
    $pdf->Cell(12);
    $pdf->Cell(50, 10, utf8_decode($row->nombreproducto), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode($row->precio), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode($row->cantidad), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode($row->descuento), 1, 0, 'C', 0);
    $pdf->Cell(50, 10, utf8_decode($row->cantidad * $row->precio), 1, 1, 'C', 0);
    
}
// align center 
$pdf->Cell(12);
$pdf->Cell(200, 10, utf8_decode("SUBTOTAL"), 1, 0, 'C', 0);
$pdf->Cell(50, 10, utf8_decode($informacion->subtotal), 1, 0, 'C', 0);

$pdf->Cell(40, 10, utf8_decode(""), 0, 1 , 'C', 0); //salto de linea
$pdf->Cell(12);
$pdf->Cell(200, 10, utf8_decode("ISV"), 1, 0, 'C', 0);
$pdf->Cell(50, 10, utf8_decode($informacion->isv), 1, 0, 'C', 0);

$pdf->Cell(40, 10, utf8_decode(""), 0, 1 , 'C', 0); //salto de linea
$pdf->Cell(12);
$pdf->Cell(200, 10, utf8_decode("TOTAL"), 1, 0, 'C', 0);
$pdf->Cell(50, 10, utf8_decode($informacion->total), 1, 0, 'C', 0);


$pdf->Output('Reporte Empleados.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
