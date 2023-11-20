<? require ('../fpdf/fpdf.php');

class PDF extends FPDF {

    function Header() {
        // Police Arial gras 15
        $this->SetFont('Arial', 'B', 12);
        // Décalage
        $this->Cell(10);
        // Titre encadré
        $this->Cell(100, 10, '', 'B', 0);
        $this->Image('../img/newloge.jpg',10,6,92);
        $this->Cell(60, 10, utf8_decode('N : 49'), 'B', 0);
        $this->Cell(20, 10, utf8_decode('Facture'), 'B', 0);
        // Saut de ligne
        $this->Ln(20);
    }

    function Body() {
        require '../page/_header.php';
        $sql = "SELECT * FROM bo_Commandes co, bo_client cl WHERE co.id_client = cl.IDCLIENTS AND co.Id_commande = ".$_GET['id']."";
        $fact = $DB->query($sql);
        foreach ($fact as $facts) :
            $this->SetFont('Arial', '', 10);
            $this->Cell(60, 10, 'NINEA : 2554172X2', 0, 0);
            $this->Cell(40,10,'Date :',0,0);
            $this->SetFont('Arial', 'B', 10);
            $date = explode("-", $facts->Date_commande);
            $this->Cell(50,10,$date[2]."/".$date[1]."/".$date[0],0,0);
            $this->SetFont('Arial', '', 10);
            $this->Cell(60,10,'CLIENT',0,0);
            $this->Ln();
            $this->Cell(60,0,"77 883 43 40 / 78 294 32 58");
            $this->Cell(40,0,"N facture :");
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50,0,'',0,0);
            $this->Cell(60,0,$facts->NOMCLIENT,0,0);
            $this->Ln();
            $this->SetFont('Arial', '', 10);
            $this->Cell(60,10,"Saly Carrefour");
            $this->Cell(40,10,"N BC :");
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50,10,"",0,0);
            $this->Cell(60,10,"TEL : ".$facts->TEL,0,0);
            $this->Ln();
            $this->SetFont('Arial', '', 10);
            $this->Cell(60,0,"");
            $this->Cell(40,0,"Mode de paiement :");
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50,0,"",0,0);
            $this->Cell(60,0,"FAX : ".$facts->FAX,0,0);
            $this->Ln();
            $this->SetFont('Arial', '', 10);
            $this->Cell(60,10,"");
            $this->Cell(40,10,"Mode de livraison :");
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(50,10,"",0,0);
            $this->Cell(60,10,"",0,0);
            $this->Ln();
        endforeach;
    }

    function Table_Head() {
        $this->SetFont('Arial', '', 8);
        $this->Cell(20,7,utf8_decode('Réf'),1,0,'C');
        $this->Cell(30,7,utf8_decode('Désignation article'),1,0,'C');
        $this->Cell(15,7,utf8_decode('Qté'),1,0,'C');
        $this->Cell(30,7,utf8_decode('Conditionnement'),1,0,'C');
        $this->Cell(25,7,utf8_decode('Prix Emballage'),1,0,'C');
        $this->Cell(25,7,utf8_decode('Total Emballage'),1,0,'C');
        $this->Cell(20,7,utf8_decode('Prix Liquide'),1,0,'C');
        $this->Cell(25,7,utf8_decode('Montant Liquide'),1,0,'C');
        $this->Ln();
    }

    function Table_Body() {
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $sql = "SELECT * FROM bo_Commandes co, bo_client cl WHERE co.id_client = cl.IDCLIENTS AND co.Id_commande = ".$_GET['id'];
        $fact = $bdd->query($sql);
        $this->SetFont('Arial', 'B', 10);
        $facts = $fact->fetch();
        $des = explode(",", $facts['des']);
        $pu = explode(",", $facts['pu']);
        $qty = explode(",", $facts['qty']);
        $count = count($qty);
        for ($i=0; $i < $count; $i++) { 
            $s = "SELECT * FROM bo_Articles WHERE LIBARTICLE = '".$des[$i]."'";
            $f = $bdd->query($s);
            $fs = $f->fetch();
            $this->Cell(20,5,$fs['REFERENCE'],'LR',0,'C');
            $this->SetFont('Arial', 'B', 7);
            $this->Cell(30,5,$des[$i],'LR',0,);
            $this->SetFont('Arial', 'B', 10);
            $this->Cell(15,5,$qty[$i],'LR',0,'C');
            $this->Cell(30,5,$fs['CONDITIONNEMENT'],'LR',0,'C');
            $this->Cell(25,5,'','LR',0,'C');
            $this->Cell(25,5,'','LR',0,'C');
            $this->Cell(20,5,number_format($pu[$i],0,',',' '),'LR',0,'C');
            $this->Cell(25,5,number_format($pu[$i] * $qty[$i],0,',',' '),'LR',0,'C');
            $this->Ln();            
        }
        $this->Cell(190,0,'',1,1);
    }

    function Foot() {
        function asLetters($number,$separateur=",") {
            $convert = explode($separateur, $number);
            $num[17] = array('zero', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix', 'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize');
                              
            $num[100] = array(20 => 'vingt', 30 => 'trente', 40 => 'quarante', 50 => 'cinquante', 60 => 'soixante', 70 => 'soixante-dix', 80 => 'quatre-vingt', 90 => 'quatre-vingt-dix');
                                              
            if (isset($convert[1]) && $convert[1] != '') {
              return asLetters($convert[0]).' et '.asLetters($convert[1]);
            }
            if ($number < 0) return 'moins '.asLetters(-$number);
            if ($number < 17) {
              return $num[17][$number];
            }
            elseif ($number < 20) {
              return 'dix-'.asLetters($number-10);
            }
            elseif ($number < 100) {
              if ($number%10 == 0) {
                return $num[100][$number];
              }
              elseif (substr($number, -1) == 1) {
                if( ((int)($number/10)*10)<70 ){
                  return asLetters((int)($number/10)*10).'-et-un';
                }
                elseif ($number == 71) {
                  return 'soixante-et-onze';
                }
                elseif ($number == 81) {
                  return 'quatre-vingt-un';
                }
                elseif ($number == 91) {
                  return 'quatre-vingt-onze';
                }
              }
              elseif ($number < 70) {
                return asLetters($number-$number%10).'-'.asLetters($number%10);
              }
              elseif ($number < 80) {
                return asLetters(60).'-'.asLetters($number%20);
              }
              else {
                return asLetters(80).'-'.asLetters($number%20);
              }
            }
            elseif ($number == 100) {
              return 'cent';
            }
            elseif ($number < 200) {
              return asLetters(100).' '.asLetters($number%100);
            }
            elseif ($number < 1000) {
              return asLetters((int)($number/100)).' '.asLetters(100).($number%100 > 0 ? ' '.asLetters($number%100): '');
            }
            elseif ($number == 1000){
              return 'mille';
            }
            elseif ($number < 2000) {
              return asLetters(1000).' '.asLetters($number%1000).' ';
            }
            elseif ($number < 1000000) {
              return asLetters((int)($number/1000)).' '.asLetters(1000).($number%1000 > 0 ? ' '.asLetters($number%1000): '');
            }
            elseif ($number == 1000000) {
              return 'millions';
            }
            elseif ($number < 2000000) {
              return asLetters(1000000).' '.asLetters($number%1000000);
            }
            elseif ($number < 1000000000) {
              return asLetters((int)($number/1000000)).' '.asLetters(1000000).($number%1000000 > 0 ? ' '.asLetters($number%1000000): '');
            }
        }
        $bdd = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
        $sql = "SELECT * FROM bo_Commandes co, bo_client cl WHERE co.id_client = cl.IDCLIENTS AND co.Id_commande = ".$_GET['id'];
        $fact = $bdd->query($sql);
        $facts = $fact->fetch();
        $this->SetFont('Arial', '', 10);
        $this->Cell(30,10);
        $this->Cell(5,10,'GM');
        $this->Ln();
        $this->Cell(30,0,'Nombre casiers');
        $this->Ln();
        $this->Cell(30,10);
        $this->Cell(5,10,'PM');
        $this->Cell(60,10);
        $this->Cell(30,10,'Total Emballage');
        $this->Ln();
        $this->Cell(30,0,'Nombre Pcs');
        $this->Ln();
        $this->Cell(35,10);
        $this->Cell(60,10);
        $this->Cell(30,10,'Total Liquide');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20,10,number_format($facts['Montant_commande'],0,',',' '));
        $this->SetFont('Arial', '', 10);
        $this->Cell(30,10,'Montant TTC');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(10,10,number_format($facts['Montant_commande'],0,',',' '));
        $this->Ln();
        $this->Cell(30,0,utf8_decode('Montant réglé'));
        $this->Cell(5,0,'0');
        $this->Ln();
        $this->Cell(0,10,utf8_decode('Arrêté la présente facture à la somme de : '.strtoupper(asLetters($facts['Montant_commande'])).' FRANCS CFA '),0,1);
    }

}

$pdf = new PDF('L', 'mm', 'A5');
$pdf->AddPage();
$pdf->Body();
$pdf->Table_Head();
$pdf->Table_Body();
$pdf->Foot();
$pdf->Output();