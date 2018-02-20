<?php
require('FPDF.php');

class Rpdf extends FPDF
{
// Page header
    function Header()
    {
        // Logo
        // $this->Image('logo.png',10,6,30);
        // Arial bold 15
        // echo $date->format('U = Y-m-d H:i:s')
        if($this->PageNo() == 1){
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
            $this->SetFont('Arial','',8);
            $this->Ln(15);
            $this->Cell(-3);
            $this->Cell(10,8,'NO.',1,0,'C');
            $this->Cell(50,8,'NAME OF INMATES',1,0,'C');
            $this->Cell(70,8,'CRIME',1,0,'C');
            $this->Cell(30,8,'CASE NO.',1,0,'C');
            $this->Cell(30,8,'COURT',1,0,'C');
            $this->SetFont('Arial','',8);
            $this->Cell(20,8,'DATE',1,0,'C');
            $this->SetFont('Arial','',8);
            $this->Cell(20,8,'PLACE',1,0,'C');
            $this->Cell(31,8,'NATURE OF RELEASE',1,0,'C');
            $this->Cell(20,8,'DATE.',1,0,'C');
            $this->Ln(3);
            $this->Cell(187);
            $this->SetFont('Arial','',8);
            $this->Cell(20,8,'COMMITTED',0,0,'C');
        }

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

    function month($m,$y,$data){
        $cnt = count($data);
    	$this->Ln(-17);
        $this->Cell(120);
        $this->SetFont('Arial','B',13);
        $this->Cell(30,10,'RELEASES FOR THE MONTH OF',0,0,'C');
        $this->SetTextColor(220,50,50);
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(30,10,$m.' '.$y,0,0,'C');
        $this->SetTextColor(0,0,0);
        $this->SetFont('Times','',11);
        $this->Cell(50);
        $this->Cell(30,10,'Total Releases: ',0,0,'C');
        $this->Cell(10,10,$cnt,0,0,'C');
    }

    function display($data){
        // echo json_encode($data);
        $cnt = count($data);

        $a = json_decode(json_encode($data));
        $b = json_decode(json_encode($a));
        $this->Ln(9);

            for($a = 0 ; $a < $cnt ; $a++){
                $courts = explode("/",$b[$a]->court);
                $crimes = explode("/",$b[$a]->crime);
                $cases = explode("/",$b[$a]->case);

                $ccnt = count($courts);


                $x = 0;
                while($x < $ccnt){
                    $this->SetFont('Arial','',8);
                    $this->Ln(8);
                    $this->Cell(-3);
                    $this->Cell(10,8,$a+1,1,0,'C');
                    $this->Cell(50,8,$b[$a]->inmateName,1,0,'C');
                    $this->Cell(70,8,$crimes[$x],1,0,'C');
                    $this->Cell(30,8,$cases[$x],1,0,'C');
                    if(strlen($courts[$x]) > 20){
                        $this->SetFont('Arial','',7);
                    }
                    $this->Cell(30,8,$courts[$x],1,0,'C');
                    $this->SetFont('Arial','',8);
                    $this->Cell(20,8,$b[$a]->doc,1,0,'C');
                    $this->Cell(20,8,$b[$a]->place,1,0,'C');
                    $this->Cell(31,8,$b[$a]->natureOfRel,1,0,'C');
                    $this->Cell(20,8,$b[$a]->dateRel,1,0,'C');
                    $x++;
                }
            }
    }
}
?>