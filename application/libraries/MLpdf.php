<?php
require('fpdf.php');


class MLpdf extends FPDF
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
            $this->Image( base_url('application/libraries/Licon.png'),40,10,32);
            $this->Image( base_url('application/libraries/Ricon.png'),220,10,30);
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
            $this->Cell(10,10,'NO.',1,0,'C');
            $this->Cell(60,10,'NAME OF INMATES.',1,0,'C');
            $this->Cell(60,10,'CRIME',1,0,'C');
            $this->Cell(40,10,'CASE NO.',1,0,'C');
            $this->Cell(20,10,'CELL NO.',1,0,'C');
            $this->Cell(30,10,'COURT',1,0,'C');
            $this->SetFont('Arial','',8);
            $this->Cell(30,10,'DATE',1,0,'C');
            $this->SetFont('Arial','',11);
            $this->Cell(20,10,'PLACE',1,0,'C');

            $this->Ln(3);
            $this->Cell(220);
            $this->SetFont('Arial','',8);
            $this->Cell(30,10,'COMMITTED',0,0,'C');
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

    // function Display($data){
    //     // echo json_encode($data);
    //     // $crime = "violation 1 \n violation 2 \n violation 3 ";
    //     // $court = "court 1 asdaj / court 2 asdkl / court 3 dasd";
    //     $cnt = count($data);

        
    //     $a = json_decode(json_encode($data));
    //     // echo json_encode($data);
        
    //         $this->Ln(7);
    //     for($b = 1 ; $b <= $cnt ; $b++){
    //         // $c = json_decode(json_encode($data[$b-1]));
    //         if($b % 13 == 0){
    //             $this->AddPage();
    //             $this->Ln(7);
    //         }
    //         // $c = json_decode(json_encode($a));
    //         $this->Cell(10,10,$b,1,0,'C');
    //         $this->Cell(60,10,$a[$b-1]->nameOfInmate,1,0,'C');
    //         // $this->Cell(80,10,$a[0]->crime,1,0,'C');
            
    //         $this->Cell(80,10,$a[$b-1]->crime,1,0,'C');
    //         // $this->Ln(-10);
    //         // $this->Cell(150);
    //         $this->Cell(40,10,$a[$b-1]->case_no,1,0,'C');
    //         $this->Cell(30,10,$a[$b-1]->court,1,0,'C');
    //         $this->Cell(30,10,$a[$b-1]->dateCommitted,1,0,'C');
    //         $this->Cell(20,10,$a[$b-1]->place,1,0,'C');
    //         $this->Ln(10);
    //     }
    
        // function Display($data){
        //     $crime = "violation 1 /violation 2 / Violation 3";
        //     $court = "RTC Branch 1 /RTC Branch 2 /RTC Branch 3";

        //     $cnt = count($data);

        //     $a = json_decode(json_encode($data));

            
           
        //     $this->Ln(-3);
        //     for($b = 1 ; $b <= $cnt ; $b++){
                
        //         $courtcnt = strlen($a[$b-1]->court);
        //         $courtcnt = strlen($court);

        //         if($courtcnt > 14){
        //             $ctr = $courtcnt;
        //             $crimectr = $courtcnt / 14;
        //             $crimecnt = strlen($crime) / $crimectr;
        //             // $crimectr = $courtcnt / 14;
        //             // $crimecnt = strlen($a[$b-1]->crime) / $crimectr;
                    
        //             for($x = 0 , $y = 0 ;  $ctr >= 0 ; ){
        //                 $this->Ln();
        //                 $this->Cell(10,10,$b,1,0,'C');
        //                 $this->Cell(60,10,$a[$b-1]->nameOfInmate,1,0,'C');
        //                 // $this->Cell(80,10,$crime,1,0,'C');
        //                 $crime1 = substr($crime,$y, $crimecnt);
        //                 $this->Cell(80,10,$crime1,1,0,'C');
        //                 $this->Cell(40,10,$a[$b-1]->case_no,1,0,'C');
        //                 $court1 = substr($court,$x,14);
        //                 $this->Cell(30,10,$court1,1,0,'C');
        //                 $this->Ln(0);
        //                 $this->Cell(220);
        //                 $this->Cell(30,10,$a[$b-1]->dateCommitted,1,0,'C');
        //                 $this->Cell(20,10,$a[$b-1]->place,1,0,'C');
                            
        //                 $y += $crimecnt;
        //                 $x += 14;      
        //                 $ctr -= 14;         
        //             }
        //         }else{
        //             $this->Ln();
        //             $this->Cell(10,10,$b,1,0,'C');
        //             $this->Cell(60,10,$a[$b-1]->nameOfInmate,1,0,'C');
        //             $this->Cell(80,10,$a[$b-1]->crime,1,0,'C');
        //             $this->Cell(40,10,$a[$b-1]->case_no,1,0,'C');
        //             $this->Cell(30,10,$a[$b-1]->court,1,0,'C');
        //             $this->Cell(30,10,$a[$b-1]->dateCommitted,1,0,'C');
        //             $this->Cell(20,10,$a[$b-1]->place,1,0,'C');
        //             // $this->Ln(10);
        //         }
        //     }
        // }
        function displayTotal($data){
            $cnt = count($data);

            $this->Ln(-12);
            $this->Cell(200);
            $this->Cell(30,10,'Total # of Inmates: ',0,0,'C');
            $this->Cell(10,10,$cnt,0,0,'C');
            $this->Ln(20);
        }
        function Display($data){
            // echo json_encode($data);
        //     $crime = "violation 1 /violation 2 /violation 3";
            // $court = "RTC Branch 1 /RTC Branch 2 /RTC Branch 3";
            $cnt = count($data);
            $a = json_decode(json_encode($data));
            $this->Ln(-11);
            for($b = 1 ; $b <= $cnt ; $b++){
                $courts = explode("/",$a[$b-1]->court);
                $crimes = explode("/",$a[$b-1]->crime);
                $cases = explode("/",$a[$b-1]->case_no);
                // $courts = explode("/",$a[$b-1]->court);
                // $crimes = explode("/",$a[$b-1]->crime);
                // echo $a[$b-1]->nameOfInmate;
                // echo $a[$b-1]->court;
                $ccnt = count($crimes);
                // echo $ccnt;

                $x = 0;
                while($x < $ccnt){
                    $this->Ln();
                    $this->Cell(10,10,$b,1,0,'C');
                    $this->Cell(60,10,$a[$b-1]->nameOfInmate,1,0,'C');
                    $this->Cell(60,10,$crimes[$x],1,0,'C');
                    $this->Cell(40,10,$cases[$x],1,0,'C');
                    $this->Cell(20,10,$a[$b-1]->cellNumber,1,0,'C');
                    // $this->Cell(30,10,$courts[$x],1,0,'C');
                    $this->Cell(30,10,$courts[$x],1,0,'C');
                    // $this->Ln(0);
                    // $this->Cell(200);
                    $this->Cell(30,10,$a[$b-1]->dateCommitted,1,0,'C');
                    $this->SetFont('Arial','',10);
                    $this->Cell(20,10,$a[$b-1]->place,1,0,'C');
                    $x++;
                }
            }

        }
}
    


?>