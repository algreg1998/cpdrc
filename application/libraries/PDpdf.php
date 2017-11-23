<?php
require('FPDF.php');

class PDpdf extends FPDF
{
// Page header
    function Header()
    {
        if ( $this->PageNo() == 1 ) {
            // Logo
            // $this->Image('logo.png',10,6,30);
            // Arial bold 15
            $date = new DateTime();
            // echo $date->format('U = Y-m-d H:i:s')

            $this->SetFont('Arial','',11);
                    // Move to the right
            $this->Cell(120);
            // Title
            $this->Image( base_url('application/libraries/Licon.png'),40,10,32);
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
            $this->Ln(10);
            $this->Cell(120);
            $this->SetFont('Arial','B',16);
            // $this->Cell(30,10,'Prison Data for the Period of 1-15 April 2017',0,0,'C');
        }
        $this->SetFont('Arial','',11);
        $this->Ln(10);
        $this->Cell(8);
        $this->Cell(17,20,'DAY',1,0,'C');
        $this->Cell(25,20,'PRISONERS',1,0,'C');
        $this->Cell(25,20,'PRISONERS',1,0,'C');
        $this->Cell(171,5,'RELEASED',1,0,'C');
        $this->Cell(17,20,'TOTAL',1,0,'C');
        $this->Ln(5);
        $this->Cell(8);
        $this->Cell(17);
        $this->Cell(25,20,'STRENGTH',0,0,'C');
        $this->Cell(25,20,'RECEIVED',0,0,'C');
        $this->SetFont('Arial','',9);
        $this->Cell(19,15,'SERVED',1,0,'C');
        $this->Cell(19,15,'PROBATION',1,0,'C');
        $this->Cell(19,15,'SHIPPED',1,0,'C');
        $this->Cell(19,15,'BONDED',1,0,'C');
        $this->Cell(19,15,'ACQUITTED',1,0,'C');
        $this->Cell(19,15,'DISMISSED',1,0,'C');
        $this->Cell(19,15,'DEAD',1,0,'C');
        $this->Cell(19,15,'OTHERS',1,0,'C');
        $this->Cell(19,5,'TOTAL',0,0,'C');
        $this->Ln(0);
        $this->Cell(227);
        $this->Cell(19,15,'PRISONERS',1,0,'C');
        $this->Ln(5);
        $this->Cell(227);
        $this->Cell(19,15,'RELEASED',0,0,'C');
    }

    // Page footer
    function Footer()
    {
        if ( $this->PageNo() == 3 ) {
            // Position at 1.5 cm from bottom

            $this->SetY(-45);
            $this->SetFont('Arial','',11);
            
            $this->Ln(0);
            $this->Cell(8);
            $this->Cell(30,10,'Prepared by:',0,0,'');
            $this->Cell(160);
            $this->Cell(30,10,'Noted:',0,0,'');

            $this->Ln(15);
            $this->Cell(8);
            $this->Cell(30,10,'________________________',0,0,'');
            $this->Cell(70);
            $this->Cell(30,10,'________________________',0,0,'');
            $this->Cell(70);
            $this->Cell(30,10,'________________________',0,0,'');

            $this->Ln(5);
            $this->Cell(8);
            $this->Cell(45,10,'Records Clerk',0,0,'C');
            $this->Cell(70);
            $this->Cell(30,10,'Acting Records Officer',0,0,'C');
            $this->Cell(70);
            $this->Cell(25,10,'Administrative Officer III',0,0,'C');
            $this->Ln(5);
            date_default_timezone_set('Asia/Manila');
            $tDate = date("F j, Y, g:i a");
            $this->Cell(70,20, 'Date : '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

    function month($m,$y){
        $this->Ln(-20);
        $this->Cell(120);
        $this->SetFont('Arial','B',16);
        $this->Cell(30,10,'Prison Data for the Period of '.$m.' '.$y,0,0,'C');
    }

    function body($data,$pStren){

        // echo json_encode($pStren);

        $cnt = count($pStren);

        $a = json_decode(json_encode($pStren));
        $b = json_decode(json_encode($pStren));

        $this->Ln(22);
        for($a = 1 ; $a < $cnt ; $a++){
            if($a % 12 == 0){
                $this->AddPage();
                $this->Ln(2);
            }
            $this->Ln(8);
            $this->Cell(8);
            $this->SetFont('Arial','',8);
            $this->Cell(17,8,$b[($a-1)]->day,1,0,'C');
            $this->Cell(25,8,$b[($a-1)]->pStrength,1,0,'C');
            $this->Cell(25,8,$b[($a-1)]->prisonersReceived,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->served,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->probation,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->shipped,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->bonded,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->acquitted,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->dismissed,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->dead,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->others,1,0,'C');
            $this->Cell(19,8,$b[($a-1)]->prisonersReleased,1,0,'C');
            $this->Cell(17,8,$b[($a-1)]->total,1,0,'C');
        }

        $c = json_decode(json_encode($data));
            $this->Ln(8);
            $this->Cell(8);
            $this->SetFont('Arial','',8);
            $this->Cell(42,8,$c[0],1,0,'C');
            $this->Cell(25,8,$c[2],1,0,'C');
            $this->Cell(19,8,$c[3],1,0,'C');
            $this->Cell(19,8,$c[4],1,0,'C');
            $this->Cell(19,8,$c[5],1,0,'C');
            $this->Cell(19,8,$c[6],1,0,'C');
            $this->Cell(19,8,$c[7],1,0,'C');
            $this->Cell(19,8,$c[8],1,0,'C');
            $this->Cell(19,8,$c[9],1,0,'C');
            $this->Cell(19,8,$c[10],1,0,'C');
            $this->Cell(19,8,$c[11],1,0,'C');
            $this->Cell(17,8,$c[12],1,0,'C');
            
    }
   
}

// Instanciation of inherited class
?>