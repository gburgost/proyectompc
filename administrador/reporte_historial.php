<?php

require('fpdf/fpdf.php');
require('conexion.php');
class PDF extends FPDF
{
var $widths;
var $aligns;

function SetWidths($w)
{
	//Set the array of column widths
	$this->widths=$w;
}

function SetAligns($a)
{
	//Set the array of column alignments
	$this->aligns=$a;
}

function Row($data)
{
	//Calculate the height of the row
	$nb=0;
	for($i=0;$i<count($data);$i++)
		$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
	$h=8*$nb;
	//Issue a page break first if needed
	$this->CheckPageBreak($h);
	//Draw the cells of the row
	for($i=0;$i<count($data);$i++)
	{
		$w=$this->widths[$i];
		$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
		//Save the current position
		$x=$this->GetX();
		$y=$this->GetY();
		//Draw the border


		$this->MultiCell($w,8,$data[$i],0,$a,'true');
		//Put the position to the right of the cell
		$this->SetXY($x+$w,$y);
	}
	//Go to the next line
	$this->Ln($h);
}

function CheckPageBreak($h)
{
	//If the height h would cause an overflow, add a new page immediately
	if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
	//Computes the number of lines a MultiCell of width w will take
	$cw=&$this->CurrentFont['cw'];
	if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
	$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
	$s=str_replace("\r",'',$txt);
	$nb=strlen($s);
	if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
	$sep=-1;
	$i=0;
	$j=0;
	$l=0;
	$nl=1;
	while($i<$nb)
	{
		$c=$s[$i];
		if($c=="\n")
		{
			$i++;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
			continue;
		}
		if($c==' ')
			$sep=$i;
		$l+=$cw[$c];
		if($l>$wmax)
		{
			if($sep==-1)
			{
				if($i==$j)
					$i++;
			}
			else
				$i=$sep+1;
			$sep=-1;
			$j=$i;
			$l=0;
			$nl++;
		}
		else
			$i++;
	}
	return $nl;
}

function Header()
{

	$this->SetFont('Arial','',25);
	$this->Text(100,30,'Historial Empleado',0,'C', 0);
	$this->Image('archivos/logompc.jpg' , 21 ,10, 35 , 38,'JPG');
	$this->Ln(50);
}

function Footer()
{
	$this->SetY(-15);
	$this->SetFont('Arial','B',8);
	$this->Cell(100,10,'Historial Empleado',0,0,'L');


}

}


	$con = new DB;
	$persona = $con->conectar();
	$persona = $_GET['rut_persona'];

	$strConsulta = "SELECT * from persona where rut_persona =  '$persona'";

	$persona = mysql_query($strConsulta);

	$fila = mysql_fetch_array($persona);

	$pdf=new PDF('L','mm','Letter');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetMargins(20,20,20);
	$pdf->Ln(5);

    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,6,'Nombre: '.$fila['nombre'].' '.$fila['apellido'],0,1);
    $pdf->Cell(0,6,'Rut: '.$fila['rut_persona'],0,1);
    $pdf->Cell(0,6,$fila['tipo_persona'],0,1);



	$pdf->Ln(10);

	$pdf->SetWidths(array(40, 35, 45, 40, 40, 40));
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(85,107,47);
    $pdf->SetTextColor(255);

		for($i=0;$i<1;$i++)
			{
				$pdf->Row(array('Fecha Entrada', 'Hora Entrada', 'Guardia Entrada', 'Fecha Salida', 'Hora Salida', 'Guardia Salida'));
			}

	$historial = $con->conectar();
	$persona= $_GET['rut_persona'];
	$desde 	 = $_GET['desde'];
	$hasta	 = $_GET['hasta'];
	$strConsulta =
		 "SELECT registro_persona.fecha_entrada,
				 registro_persona.hora_entrada,
			 	 registro_persona.fecha_salida,
				 registro_persona.hora_salida,
				 registro_persona.rut_guardia1,
	             guardia.nombre_guardia,
	             guardia.apellido_guardia,
	             guardia.rut_guardia

	FROM registro_persona
	Inner Join guardia ON registro_persona.rut_guardia = guardia.rut_guardia
	WHERE registro_persona.rut_persona = '$persona' AND registro_persona.fecha_entrada >= '$desde' AND registro_persona.fecha_salida <= '$hasta' ORDER BY cod_registro DESC";

	$historial = mysql_query($strConsulta);
	$numfilas = mysql_num_rows($historial);

	for ($i=0; $i<$numfilas; $i++)
		{
			$fila = mysql_fetch_array($historial);
			$pdf->SetFont('Arial','',12);

			if($i%2 == 1)
			{
				$ArrayFecha =explode('-', $fecha_entrada = $fila['fecha_entrada']);
     			$fecha_entrada = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

     			$ArrayFecha =explode('-', $fecha_salida = $fila['fecha_salida']);
     			$fecha_salida = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($fila['fecha_entrada'], $fila['hora_entrada'], $fila['nombre_guardia'].' '.$fila['apellido_guardia'], $fila['fecha_salida'], $fila['hora_salida'], $fila['rut_guardia1']));
			}
			else
			{
				$ArrayFecha =explode('-', $fecha_entrada = $fila['fecha_entrada']);
     			$fecha_entrada = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];

     			$ArrayFecha =explode('-', $fecha_salida = $fila['fecha_salida']);
     			$fecha_salida = $ArrayFecha[2] ."-".$ArrayFecha[1] ."-".$ArrayFecha[0];


				$pdf->SetFillColor(255,255,255);
    			$pdf->SetTextColor(0);
				$pdf->Row(array($fila['fecha_entrada'], $fila['hora_entrada'], $fila['nombre_guardia'].' '.$fila['apellido_guardia'], $fila['fecha_salida'], $fila['hora_salida'], $fila['rut_guardia1']));
			}
		}

$pdf->Output();
?>
