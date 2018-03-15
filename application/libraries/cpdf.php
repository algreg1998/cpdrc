<?php
require('fpdf.php');

class cpdf extends FPDF
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
        $this->Cell(80);
        // Title
        $this->Image(base_url('application/libraries/Licon.png'),15,10,32);
        $this->Image(base_url('application/libraries/Ricon.png'),165,10,30);
        $this->Cell(30,10,'Republic of the Philippines',0,0,'C');
        // Line break
        $this->Ln(5);
        $this->Cell(80);
        $this->Cell(30,10,'Province of Cebu',0,0,'C');
        $this->Ln(5);
        $this->Cell(80);
        $this->SetFont('Arial','B',11);
        $this->Cell(30,10,'OFFICE OF THE PROVINCIAL WARDEN',0,0,'C');
        $this->Ln(5);
        $this->Cell(80);
        $this->SetFont('Times','',11);
        $this->Cell(30,10,'CEBU PROVINCIAL DETENTION AND REHABILITATION CENTER',0,0,'C');
        $this->Ln(5);
        $this->Cell(80);
        $this->SetFont('Arial','',11);
        $this->Cell(30,10,'Kalunasan, Cebu City',0,0,'C');
        $this->Ln(5);
        $this->Cell(80);
        $this->Cell(30,10,'Tel. No. (032) 254-0641 / Fax (032) 255-3673',0,0,'C');
        $this->Ln(10);
        $this->Cell(80);
        $this->Cell(30,10,"INMATE'S PROFILE",0,1,'C');

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

    function body($data1,$data2,$data3,$data4,$data5){

        // echo $id;
        
        $a = json_decode(json_encode($data1));
        $b = json_decode(json_encode($data2));
        $c = json_decode(json_encode($data3));
        $this->Image(base_url('uploads/inmate/'.$a[0]->filename),125,65,65,55);
        $this->Ln(5);
        $this->SetFont('Arial','',10);
        $this->Cell(50,5,"CPDRC Form No.".$a[0]->formid ,0,1,'C');
        $this->Ln(5);
        $this->Cell(15,5,"Name",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->fname." ".$a[0]->mi.". ".$a[0]->lname,0,1,'C');
        $this->Cell(15,5,"Nickname",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->alias,0,1,'C');
        $this->Cell(15,5,"Date of Confinement",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->date_added,0,1,'C');
        $this->Cell(15,5,"Crime",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->SetFont('Arial','',7);
        if(strlen($b[0]->crime) > 36){
            $this->Cell(6.5);
            $this->SetFont('Arial','',7);
            $this->Cell(15,5,substr($b[0]->crime,0,35),0,1,'C');
            $this->Cell(46);
            $this->SetFont('Arial','',10);
            $this->Cell(15,5,"____________________________",0,0,'');
            $this->Cell(6.5);
            $this->SetFont('Arial','',7);
            $this->Cell(15,5,substr($b[0]->crime,35,35),0,1,'C');
            $this->Cell(46);
            $this->SetFont('Arial','',10);
            $this->Cell(15,5,"____________________________",0,1,'');
            $this->Cell(6.5);
            $this->SetFont('Arial','',7);
            $this->Cell(15,5,substr($b[0]->crime,70,35),0,1,'C');
            $this->Ln(-5);
        }else{
            $this->Cell(6.5);
            $this->Cell(15,5,$b[0]->crime,0,1,'C');
            $this->Cell(46);
            $this->SetFont('Arial','',10);
            $this->Cell(15,5,"____________________________",0,1,'');
            $this->Cell(46);
            $this->Cell(15,5,"____________________________",0,1,'');
        }
        $this->SetFont('Arial','',10);
        $this->Cell(15,5,"Case No.",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,"",0,1,'C');
        $this->Cell(15,5,"Court",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        if(strlen($b[0]->court) > 30){
            $this->Cell(6.5);
            $this->Cell(15,5,substr($b[0]->court,0,30),0,1,'C');
            $this->Cell(46);
            $this->Cell(15,5,"____________________________",0,0,'');
            $this->Cell(6.5);
            $this->Cell(15,5,substr($b[0]->court,30,30),0,1,'C');
            $this->Cell(46);
            $this->Cell(15,5,"____________________________",0,0,'');
            $this->Cell(6.5);
            $this->Cell(15,5,substr($b[0]->court,60,30),0,1,'C');
        }else{
            $this->Cell(6.5);
            $this->Cell(15,5,$b[0]->court,0,1,'C');
            $this->Cell(46);
            $this->Cell(15,5,"____________________________",0,1,'');
            $this->Cell(46);
            $this->Cell(15,5,"____________________________",0,1,'');
        }
        $this->Cell(15,5,"Sentence",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$b[0]->sentence,0,1,'C');
        $this->Cell(15,5,"Inmate No.",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->id,0,0,'C');
        $this->Cell(30);
        $this->Cell(15,5,"Height",0,0,'');
        $this->Cell(5);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->height." cm",0,1,'C');
        $this->Cell(15,5,"Class",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,"",0,0,'C');
        $this->Cell(30);
        $this->Cell(15,5,"Weight",0,0,'');
        $this->Cell(5);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->weight." pounds",0,1,'C');
        $this->Cell(15,5,"Nationality",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->nationality,0,0,'C');
        $this->Cell(30);
        $this->Cell(15,5,"Complexion",0,0,'');
        $this->Cell(5);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        //$this->SetFont('Arial','',7);
        $complexion = $a[0]->complexion;
        if($complexion == "Light skin that always burns and never tans."){
            $complexion = "Light skin";
        }else if($complexion == "Fair skin that usually burns, then tans."){
            $complexion = "Fair skin";
        }else if($complexion == "Medium skin that may burn, but tans well."){
            $complexion = "Medium skin";
        }else if($complexion == "Olive skin that rarely burns and tans well."){
            $complexion = "Olive skin";
        }else if($complexion == "Tan brown skin that very rarely burns and tans well."){
            $complexion = "Tan Brown skin";
        }else if($complexion == "Black brown skin that never burns and tans very well."){
            $complexion = "Black Brown skin";
        }
        $this->Cell(15,5,$complexion,0,1,'C');
        $this->Cell(15,5,"Religion",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,"Religion",0,0,'C');
        $this->Cell(30);
        $this->Cell(15,5,"Hair",0,0,'');
        $this->Cell(5);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->hair,0,1,'C');
        $this->Cell(15,5,"Date of Birth",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->bday,0,0,'C');
        $this->Cell(30);
        $this->Cell(15,5,"Build",0,0,'');
        $this->Cell(5);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->build,0,1,'C');
        $this->Cell(15,5,"Place of Birth",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->home,0,1,'C');
        $this->Cell(15,5,"Present Address",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->address,0,1,'C');
        $this->Cell(15,5,"Civil Status",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->status,0,1,'C');
        $this->Cell(15,5,"Occupation",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->occupation,0,1,'C');
        $this->Cell(15,5,"Father's Name",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->father,0,1,'C');
        $this->Cell(15,5,"Mother's Maiden Name",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,$a[0]->mother,0,1,'C');
        $this->Cell(20);
        $this->Cell(50,5,"(Incase of Emergency)",0,1,'C');
        $this->Cell(15,5,"Contact Person",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,"",0,1,'C');
        $this->Cell(15,5,"Address",0,0,'');
        $this->Cell(30);
        $this->Cell(15,5,":____________________________",0,0,'');
        $this->Cell(6.5);
        $this->Cell(15,5,"",0,1,'C');

        $this->Ln(10);
        $this->Cell(45);
        $this->Cell(15,5,"_____________________________",0,1,'');
        $this->Cell(55);
        $this->Cell(15,7,"(Detainee's Signature)",0,1,'');
        $this->Ln(10);
        $this->Cell(45);
        $this->Cell(15,5,"Date of Release",0,0,'');
        $this->Cell(15);
        $this->Cell(15,5,"____________________________",0,1,'');
        $this->Cell(45);
        $this->Cell(15,5,"Authority for",0,1,'');
        $this->Cell(45);
        $this->Cell(15,5,"Release / Transfer",0,0,'');
        $this->Cell(15);
        $this->Cell(15,5,"____________________________",0,1,'');

        $this->Ln(10);
        $this->Cell(20);
        $this->Cell(50,5,"Prepared and Verified by:",0,0,'C');
        $this->Cell(20);
        $this->Cell(50,5,"Approved by:",0,1,'C');
        $this->Ln(10);
        $this->Cell(20);
        $this->Cell(50,0,$data4,0,0,'C');
        $this->Cell(20);
        $this->Cell(50,0,$data5,0,1,'C');
        $this->Cell(20);
        $this->Cell(50,3,"______________________________",0,0,'C');
        $this->Cell(20);
        $this->Cell(50,3,"______________________________",0,1,'C');

    }

    function display($data1,$data2,$data3){

        echo json_encode($data1);
        echo json_encode($data2);
        echo json_encode($data3);
    }


}


?>

