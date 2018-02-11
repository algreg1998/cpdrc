<?php

class CITpdf extends FPDF
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
        $this->Cell(30,10,'CRIME INDEX',0,0,'C');

        $this->SetFont('Times','',11);
        date_default_timezone_set('Asia/Manila');
        $tDate = date("F j, Y, g:i a");
        $this->Ln(5);
        $this->Cell(70,20, 'Date : '.$tDate, 0, false, 'C', 0, '', 0, false, 'T', 'M');


        $this->SetFont('Arial','',8);
        $this->Ln(15);
        $this->Cell(8);
        $this->Cell(10,8,'NO.',1,0,'C');
        $this->Cell(210,8,'CRIME',1,0,'C');
        $this->Cell(40,8,'TOTAL.',1,0,'C');
        // $this->Cell(10,8,'NO.',1,0,'C');
        // $this->Cell(80,8,'CRIME',1,0,'C');
        // $this->Cell(40,8,'TOTAL.',1,0,'C');
        // $this->Cell(10,8,'NO.',1,0,'C');
        // $this->Cell(80,8,'CRIME',1,0,'C');
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
    function BasicTable($data)
    {
        
        // Data
        //echo json_encode($data);
        $a = 1;
        $ctr = 1;
        // $lnmin = 0;
        $this->SetFont('Arial','',8);
        foreach($data as $row){
        // for($ctr = 1 ; $a < 100 ; $ctr++ ){
            

            // if($ctr < 19){
            //     $this->Cell(8);
            // }else if($ctr == 19){
            //     $this->Ln(-144);
            //     $this->Cell(138);
            // }else if($ctr % 37 == 0){
            //     $ctr = 1;
            //     $this->Cell(8);
            // }else{
            //     $this->Cell(138);
            // }


            //     $this->Cell(10,8,$a,1,0,'C');
            //     $this->Cell(80,8,$row['name'],1,0,'C');
            //     $this->Cell(40,8,$row['count'],1,0,'C');
            //     $a++;
            //     $this->Ln();
            //     $ctr++;
                // $lnmin

                $this->Cell(8);
                $this->Cell(10,8,$a,1,0,'C');
                $width = $this->GetStringWidth($row['name']);
                if($width > 130){
                    $this->SetFont('Arial','',6);
                }
                $this->Cell(210,8,$row['name'],1,0,'C');
                $this->SetFont('Arial','',8);
                $this->Cell(40,8,$row['count'],1,0,'C');
                $a++;
                $this->Ln();
                $ctr++;
        }
    }
}


?>