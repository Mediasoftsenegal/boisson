<?php 

            require '../page/_header.php';

            $dess[] = $_GET['des'];

            $des = implode(",", $dess[0]);

            $prices[] = $_GET['price'];

            $price = implode(",", $prices[0]);

            $qtys[] = $_GET['qty'];

            $qty = implode(",", $qtys[0]);

            $totq = $_GET['totqty'];

            $tot = $_GET['total'];

            $client = $_GET['id_client'];

            $date = date("Y-m-d");

            $numfac = "#".date('Ym').$_SESSION['cpt'];

            $sql = "INSERT INTO bo_Commandes (Date_commande, des, qty, pu, totq, id_client, Montant_commande,num_fac) VALUES (:date, :des, :qty, :pu, :totq, :cli, :num_fac,)";

            $data = array(

                ":date" => $date,

                ":des" => $des,

                ":qty" => $qty,

                ":pu" => $price,

                ":totq" => $totq,

                ":cli" => $client,

                ":total" => $tot,

                ":num_fac" => $numfac,

            );

            $DB->query($sql, $data);

            

            $DB->query("DELETE FROM bo_panier WHERE id_user = ".$_SESSION['id']);

            

            header("location: commande.php");

        ?>