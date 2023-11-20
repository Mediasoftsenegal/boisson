<?php
$id = $_GET['id'];
?>
<?php
    require '../fpdf/fpdf.php';

    class PDF extends FPDF{
    function Header(){
        $this->Image('soboa.png',5,0,25,25);
        //$this->SetMargins(5,5,5);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(20);
        $this->Cell(110,4,"SOCIETE DES BRASSERIES DE L'OUEST AFRICAIN",0,0,'L');
        $this->SetFont('Arial', 'B', 9);
        $this->Cell(70,4,'N* : 24',0,0,'L');
        $this->Cell(10,4,'Facture',0,0,'R');
        $this->Ln();
        $this->Cell(0,0,'',1,1);
    }

    function headerTable(){
        $this->SetFont('Arial', 'B', 9);
        $this->SetY(40);
        $this->SetMargins(5,5,5);
        $this->Cell(20,10,utf8_decode('Réf.'),1,0,'C');
        $this->Cell(30,10,utf8_decode('Désignation Article'),1,0,'C');
        $this->Cell(10,10,utf8_decode('Qté'),1,0,'C');
        $this->Cell(20,10,'Conditionnement',1,0,'C');
        $this->Cell(20,10,'Prix Emballage',1,0,'C');
        $this->Cell(20,10,'Total Emballage',1,0,'C');
        $this->Cell(20,10,'Prix Liquide',1,0,'C');
        $this->Cell(20,10,'Remise',1,0,'C');
        $this->Cell(20,10,'Total',1,0,'C');
        $this->Ln();
    }

    function viewTable(){
        $this->SetFont('Arial', '', 9);
        $this->SetMargins(5,5,5);
        $des[] = $_GET['des'];
        $qtys[] = $_GET['qty'];
        $prices[] = $_GET['price'];
        $subtots[] = $_GET['subtot'];
        require '../page/_header.php';
        for($i=0; $i<$panier->count(); $i++){
            $this->Cell(90,5,$des[0][$i],1,0,'C');
            $this->Cell(40,5,number_format($prices[0][$i],2,","," "),1,0,'C');
            $this->Cell(20,5,$qtys[0][$i],1,0,'C');
            $this->Cell(40,5,number_format($subtots[0][$i],2,","," "),1,0,'C');
            $this->Ln();
        }
    }

    function footerTable(){
        $this->SetFont('Arial', 'B', 9);
        $this->SetMargins(5,5,5);
        $totqty = $_GET['totqty'];
        $total = $_GET['total'];
        $this->Cell(130,5,'TOTAL',1,0,'C');
        $this->Cell(20,5,$totqty,1,0,'C');
        $this->Cell(40,5,number_format($total,2,","," "),1,0,'C');
        $this->Ln();
    }

    function body(){
        $this->Ln();
    }

    function Footer(){
        $this->SetFont('Arial', 'B', 12);
        $this->SetMargins(5,5,5);
        $this->SetY(220);
        $this->Ln();
    }
    }

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    //$pdf->Header();
    $pdf->headerTable();
    $pdf->viewTable();
    $pdf->footerTable();
    $pdf->body();
    $pdf->Output();
?>