<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
    function Header()
    {
        // Logo
        // $this->Image('logo.png',10,6,30);
        // Arial bold 15

        // echo $date->format('U = Y-m-d H:i:s')

        $this->SetFont('Arial','',11);
                // Move to the right
        $this->Cell(120);
        // Title
        $this->Image('Licon.png',40,10,32);
        $this->Image('Ricon.png',220,10,30);
        $this->Cell(30,10,'Republic of the Philippines',0,0,'C');
        // Line break
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(30,10,'Province of Cebu',0,0,'C');
        $this->Ln(5);
        $this->Cell(120);
        $this->SetFont('Arial','B',11);
        $this->Cell(30,10,'OFFICE OF THE PROVINCIAL WARDEN',0,0,'C');
        $this->Ln(5);
        $this->Cell(120);
        $this->SetFont('Times','',11);
        $this->Cell(30,10,'CEBU PROVINCIAL DETENTION AND REHABILITATION CENTER',0,0,'C');
        $this->Ln(5);
        $this->Cell(120);
        $this->SetFont('Arial','',11);
        $this->Cell(30,10,'Kalunasan, Cebu City',0,0,'C');
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(30,10,'Tel. No. (032) 254-0641 / Fax (032) 255-3673',0,0,'C');
        $this->Ln(5);
        $this->Cell(120);
        $this->SetFont('Arial','B',16);
        $this->Cell(30,10,'DETAINEES MASTERLIST',0,0,'C');

        $this->SetFont('Arial','',11);
        $this->Ln(10);
        $this->Cell(-3);
        $this->Cell(10,10,'NO.',1,0,'C');
        $this->Cell(60,10,'NAME OF INMATES.',1,0,'C');
        $this->Cell(80,10,'CRIME',1,0,'C');
        $this->Cell(40,10,'CASE NO.',1,0,'C');
        $this->Cell(30,10,'COURT',1,0,'C');
        $this->SetFont('Arial','',8);
        $this->Cell(20,10,'DATE',1,0,'C');
        $this->SetFont('Arial','',11);
        $this->Cell(20,10,'PLACE',1,0,'C');
        $this->Cell(20,10,'QTY.',1,0,'C');
        $this->Ln(3);
        $this->Cell(217);
        $this->SetFont('Arial','',8);
        $this->Cell(20,10,'COMMITTED',0,0,'C');
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom

        $this->SetY(-15);
        $this->SetFont('Arial','',11);
        date_default_timezone_set('Asia/Manila');
        $tDate = date("F j, Y, g:i a");
        $this->Cell(70,20, 'Date : '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');

    }
}

// Instanciation of inherited class
$pdf = new PDF('L','mm','A4');;
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->Output();
?>