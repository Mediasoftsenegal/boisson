<?php
require '../page/_header.php';
$pdo = new PDO('mysql:host=localhost;dbname=remacons_wp101;charset=utf8', 'remacons', 'K330D)A.dbn2Rc');
$des[] = $_GET['des'];
$price[] = $_GET['price'];
$qty[] = $_GET['qty'];
$subtot[] = $_GET['subtot'];
$totqty = $_GET['totqty'];
$total = $_GET['total'];
$id_article = $_GET['id_article'];
$id_client = $_GET['id_client'];
$date = date("Y-m-d");
//echo $id_article;
$qtys = implode(",", $qty[0]);
//echo $qtys;
$prices = implode(",", $price[0]);
//echo $prices;
$sql = "INSERT INTO bo_appro (date_appro, id_fournisseur, montant) VALUES (:date, :id, :mont)";
$res = $pdo->prepare($sql);
$exe = $res->execute(array(
    ":date" => $date,
    ":id" => $id_client,
    ":mont" => $total
));
if ($exe) { 
    $appros = $DB->query("SELECT * FROM bo_appro ORDER BY id_appro DESC LIMIT 1");
    foreach ($appros as $appro):
        $sq = "INSERT INTO bo_ligne_appro (id_appro, id_article, prix_unitaire, quantite) VALUES (:id_ap, :id_art, :prix, :qty)";
        $re = $pdo->prepare($sq);
        $ex = $re->execute(array(
            ":id_ap" => $appro->id_appro,
            ":id_art" => $id_article,
            ":prix" => $prices,
            ":qty" => $qtys
        ));
        if ($ex) {
            $stocks = $DB->query("SELECT * FROM bo_ligne_appro ORDER BY id_ligne_appro DESC LIMIT 1");
            foreach ($stocks as $stock):
                $id_articles = explode(",",$stock->id_article);
                $prix = explode(",",$stock->prix_unitaire);
                $quantite = explode(",",$stock->quantite);
                $a = count($id_articles);
                for ($i=0;$i<$a;$i++):
                    //echo $id_articles[$i];
                    $sts = $pdo->query("SELECT * FROM bo_Stock_Depot WHERE id_article = $id_articles[$i]");
                    //echo $sts[0];
                    $st = $sts->fetch();
                    $date = date('Y-m-d');
                    $b = count($st['id_article']);
                    echo $b;
                    if ($b == 0) {
                        $s = "INSERT INTO bo_Stock_Depot (id_article, qte_achetee, Datemaj) VALUES (:id, :qte, :date)";
                        echo $s;
                        $r = $pdo->prepare($s);
                        $e = $r->execute(array(
                            ":id" => $id_articles[$i],
                            ":qte" => $quantite[$i],
                            ":date" => $date
                        ));
                    } else {
                        echo "Déja inscrit";
                    }
                endfor;
            endforeach;
        }
    endforeach;
    header('location: appro.php');
}