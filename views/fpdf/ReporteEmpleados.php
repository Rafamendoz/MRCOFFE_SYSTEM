<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include("../../conexion.php"); //llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('logo.png', 250, 2, 40); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(95); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Mr Coffee'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      // /* UBICACION */
      // $this->Cell(180);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      // $this->Ln(5);

      // /* TELEFONO */
      // $this->Cell(180);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      // $this->Ln(5);

      // /* COREEO */
      // $this->Cell(180);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      // $this->Ln(5);

      // /* TELEFONO */
      // $this->Cell(180);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      // $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(228, 161, 27);
      $this->Cell(100); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("REPORTE DE EMPLEADOS "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 161, 27); //colorFondo
      $this->SetTextColor(0, 0, 0); //colorTexto
      $this->SetDrawColor(0, 0, 0); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(20, 10, utf8_decode('ID°'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('IDENTIDAD'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('FECHA CONTRATO'), 1, 0, 'C', 1);
      $this->Cell(65, 10, utf8_decode('DIRECCIÓN'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('TELÉFONO'), 1, 0, 'C', 1);
      $this->Cell(40, 10, utf8_decode('CARGO'), 1, 1, 'C', 1);
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
SELECT 

idempleados,
CONCAT(nombre, ' ' , apellido) as nombre ,
identidad,
fechaContratacion,
direccion,
telefono,
nombreCargo


from empleados as e

join cargos as c
on e.idcargo = c.idcargo 
order by CONCAT(nombre, ' ' , apellido) 
";
$consulta_info = $mysqli->query($query);

//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

while ($row = $consulta_info->fetch_object()) {
   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(20, 10, utf8_decode($i), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($row->nombre), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($row->identidad), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($row->fechaContratacion), 1, 0, 'C', 0);
   $pdf->Cell(65, 10, utf8_decode($row->direccion), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($row->telefono), 1, 0, 'C', 0);
   $pdf->Cell(40, 10, utf8_decode($row->nombreCargo), 1, 1, 'C', 0);
}

$pdf->Output('Reporte Empleados.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)
