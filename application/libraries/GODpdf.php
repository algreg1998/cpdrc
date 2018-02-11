<?php
require('FPDF.php');

class GODpdf extends FPDF
{
// Page header
    function Header()
    {

        // Logo
        // $this->Image('logo.png',10,6,30);
        // Arial bold 15
        // echo $date->format('U = Y-m-d H:i:s')
        $this->Cell(120);
        $this->SetFont('Times','',40);
        $this->Cell(30,10,'GEOGRAPHICAL ORIGIN OF DETAINEE',0,0,'C');

        $this->SetFont('Times','',11);
        date_default_timezone_set('Asia/Manila');
        $tDate = date("F j, Y, g:i a");
        $this->Ln(5);
        $this->Cell(70,20, 'Date : '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');


        $this->SetFont('Arial','',8);
        $this->Ln(15);
        $this->Cell(8);
        $this->Cell(83,8,'NO.',1,0,'C');
        $this->Cell(83,8,'PLACE',1,0,'C');
        $this->Cell(83,8,'TOTAL.',1,0,'C');
        // $this->Cell(10,8,'NO.',1,0,'C');
        // $this->Cell(80,8,'PLACE',1,0,'C');
        // $this->Cell(40,8,'TOTAL.',1,0,'C');
        // $this->Cell(10,8,'NO.',1,0,'C');
        // $this->Cell(80,8,'PLACE',1,0,'C');
        // $this->Cell(40,8,'TOTAL.',1,0,'C');
         $this->Ln();
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom

        $this->SetY(-15);
        $this->SetFont('Arial','',11);
        
    }
    // Simple table
    function BasicTable($data)
    {
       
        // Data
        // echo json_encode($data);
        // $v = count($data);

        // $half = ($v+1)/2;
        // $halfi=intval($half);
        // $cnt = 0;
        // $a = json_decode(json_encode($data));
        //     $this->Ln(-8);
        //     for($i = 0; $i < $half; $i++) {
        //         $this->Ln();
        //         $this->Cell(8);
        //         $b = json_decode(json_encode($a[$i]));
        //         $this->Cell(10,8,$i+1,1,0,'C');
        //         $this->Cell(80,8,$b[0]->place,1,0,'C');
        //         $this->Cell(40,8,$b[0]->count,1,0,'C');
        //         if($i+1 < $halfi){
        //             $b = json_decode(json_encode($a[$i+$half]));
        //             $this->Cell(10,8,$i+1+$halfi,1,0,'C');
        //             $this->Cell(80,8,$b[0]->place,1,0,'C');
        //             $this->Cell(40,8,$b[0]->count,1,0,'C');
                    
        //         }
        //     }


        $cnt = $ctr = 0;

        $v = count($data);
        $a = json_decode(json_encode($data));
        for($i = 0; $cnt < $v; $i++) {

            if($i < 18){
                $this->Cell(8);
            }else if($i == 18){
                $this->Ln(-144);
                $this->Cell(138);
            }else if($i % 36 == 0){
                $i = 0;
                $this->AddPage();
                $this->Cell(8);

            }else{
                $this->Cell(138);
            }

            // $this->Cell(8);
            // $b = json_decode(json_encode($a[$cnt]));
            // $this->Cell(10,8,$cnt+1,1,0,'C');
            // $this->Cell(80,8,"test",1,0,'C');
            // $this->Cell(40,8,"test",1,0,'C');
            // $this->Ln();
            // $cnt++;

            $b = json_decode(json_encode($a[$cnt]));
            $this->Cell(10,8,$cnt+1,1,0,'C');
            $this->Cell(80,8,$b[0]->place,1,0,'C');
            $this->Cell(40,8,$b[0]->count,1,0,'C');
            $this->Ln();
            $cnt++;
        }



        
        // foreach($data as $row){
            
        //     foreach ($row as $r) {
        //         if($cnt < $v/2  ){
        //             $this->Cell(8);
        //              $this->Cell(18,7,$r['place'],1,0,'C');
        //             $this->Cell(18,7,$r['count'],1,0,'C');
        //             $this->Cell(18,7,$v,1,0,'C');
        //             $this->Cell(18,7,$cnt,1,0,'C');
        //             $this->Cell(18,7,$v/2,1,0,'C');
                    
        //             $this->Cell(18,7,$cnt % ($v/2),1,0,'C');
        //             $this->Ln();
        //         }else{
        //             $this->Cell(140);
        //             $this->Cell(18,7,$r['place'],1,0,'C');
        //             $this->Cell(18,7,$r['count'],1,0,'C');
        //             $this->Cell(18,7,$v,1,0,'C');
        //             $this->Cell(18,7,$cnt,1,0,'C');
        //             $this->Cell(18,7,$v/2,1,0,'C');
                    
        //             $this->Cell(18,7,$cnt % ($v/2),1,0,'C');
        //         }
        //         $this->Ln();
               
        //     }
        //     $a=0;
        //     $this->SetFont('Times','',10);
        //     foreach($row as $col){
        //         if($a == 0){
        //             $this->Cell(20);
        //             $this->Cell(36,7,$col,1,0,'C');
        //         }else{
        //             $this->SetFont('ZapfDingbats','', 10);
        //             $this->Cell(18,7,$col,1,0,'C');
        //         }
        //         $a++;
        //     }
            
        //     $cnt ++;
        // }
    }
}

?>