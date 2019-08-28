<?php

//require 'register.php';
include('../qrcode/qrlib.php');
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->Image('mic.png',10,5,15,20);
	// Arial bold 15
	$this->SetFont('Arial','B',15);
	// Move to the right
	$this->Cell(80);
	// Title
	$this->Cell(30,10,"MHRD's Innovation Cell" ,0,0,'C');
	// Line break
	$this->Ln(20);
}

// Page footer
function Footer()
{
	// Position at 1.5 cm from bottom
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


////Generation of QR
//$event_id = $_POST['event_id'];
$reg_id = $_POST['reg_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$venue = $_POST['venue'];
$event_title = $_POST['event_title'];
//$st = $event_id.$user_id;
$file_name = '../codes/'.$reg_id.'.png';

$code_text = '{"num":"'.$reg_id.'"}';

QRcode::png($code_text,$file_name);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->Image($file_name,50,100,100,100);

$pdf->SetFont('Arial','',15);
$pdf->Cell(0,10,'EVENT : '.$event_title,1,1,'C');
$pdf->Cell(0,10,'Name : '.$name,0,1,'L');
$pdf->Cell(0,10,'Email : '.$email,0,2,'L');
$pdf->Cell(0,10,'Venue : '.$venue,0,1,'L');
$pdf->Cell(0,10,'Date : '.$date,0,1,'L');
$pdf->Cell(0,10,'Time : '.$time,0,1,'L');

$pdf->Output();

?>


