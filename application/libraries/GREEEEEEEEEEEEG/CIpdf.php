<?php
require('fpdf.php');

$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'cpdrc-ic');

class CIpdf extends FPDF
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
        $this->Image(base_url('application/libraries/Licon.png'),40,10,32);
        $this->Image(base_url('application/libraries/Ricon.png'),220,10,30);
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
        // $this->Cell(120);
        // $this->SetFont('Arial','B',16);
        // $this->SetTextColor(220,50,50);
        // $this->Cell(30,10,'1. MURDER',0,0,'C');

        $this->SetTextColor(0,0,0);
        $this->SetFont('Arial','',11);
        $this->Ln(10);
        // $this->Cell();
        $this->Cell(10,10,'NO.',1,0,'C');
        $this->Cell(60,10,'NAME OF INMATES',1,0,'C');
        $this->Cell(80,10,'CRIME',1,0,'C');
        $this->Cell(40,10,'CASE NO.',1,0,'C');
        $this->Cell(30,10,'COURT',1,0,'C');
        $this->SetFont('Arial','',8);
        $this->Cell(20,10,'DATE',1,0,'C');
        $this->SetFont('Arial','',11);
        $this->Cell(20,10,'PLACE',1,0,'C');
        $this->Cell(20,10,'QTY.',1,0,'C');
        $this->Ln(3);
        $this->Cell(220);
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

    // function Murder(){
    //     $this->Ln(-12);
    //     $this->Cell(120);
    //     $this->SetFont('Arial','B',16);
    //     $this->SetTextColor(220,50,50);
    //     $this->Cell(30,10,'1. MURDER',0,0,'C');
    //     $this->SetTextColor(0,0,0);
    //     $this->SetFont('Arial','',9);

    // }

    // function Robbery(){
    //     $this->Ln(-12);
    //     $this->Cell(120);
    //     $this->SetFont('Arial','B',16);
    //     $this->SetTextColor(220,50,50);
    //     $this->Cell(30,10,'1. ROBBERY',0,0,'C');
    //     $this->SetTextColor(0,0,0);
    //     $this->SetFont('Arial','',9);
    // }

    function ViolationName($data,$data2){

        $cnt = count($data2);

        $this->Ln(-12);
        $this->Cell(120);
        $this->SetFont('Arial','B',16);
        $this->SetTextColor(220,50,50);
        $this->Cell(30,10,'1. '.$data,0,0,'C');
        $this->SetTextColor(0,0,0);
        $this->SetFont('Times','',11);
        $this->Cell(50);
        $this->Cell(20,10,'Total : ',0,0,'C');
        $this->Cell(10,10,$cnt,0,0,'');
        $this->SetFont('Arial','',9);
    }

    function Display($data){
        // echo json_encode($data);
        $cnt = count($data);

        $this->Ln(19);
        $a = json_decode(json_encode($data));
        for($b = 1 ; $b <= $cnt ; $b++){

            $this->Cell(10,10,$b,1,0,'C');
            $this->Cell(60,10,$a[$b-1]->nameOfInmate,1,0,'C');
            $this->Cell(80,10,'CRIME',1,0,'C');
            $this->Cell(40,10,$a[$b-1]->case_no,1,0,'C');
            $this->Cell(30,10,$a[$b-1]->court,1,0,'C');
            $this->Cell(20,10,$a[$b-1]->dateCommitted,1,0,'C');
            $this->Cell(20,10,$a[$b-1]->place,1,0,'C');
            $this->Cell(20,10,'QTY.',1,0,'C');
            $this->Ln(10);
        }

    }
}


?>