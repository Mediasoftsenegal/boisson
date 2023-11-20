<?php
    class paniers{
        private $DB;

        public function __construct($DB){
            if(!isset($_SESSION)){
                session_start();
            }
            if(!isset($_SESSION['panier'])){
                $_SESSION['panier'] = array();
            }
            $this->DB = $DB;

            if(isset($_GET['del'])){
                $this->del($_GET['del']);
            }

            if(isset($_POST['panier']['quantity'])){
                $this->recalc();
            }
        }

        public function recalc(){
            foreach($_SESSION['panier'] as $product_id => $quantity){
                if(isset($_POST['panier']['quantity'][$product_id])){
                    $_SESSION['panier'][$product_id] = $_POST['panier']['quantity'][$product_id];
                }
            }
        }

        public function count($id){
            $nombre = 0;
            $counts = $this->DB->query("SELECT COUNT(*) AS nombre FROM bo_panier WHERE id_user = $id");
            foreach ($counts as $count) {
                $nombre = $count->nombre;
            }
            return $nombre;
        }

        public function subtot(){
            $subtot = 0;
            $ids = array_keys($_SESSION['panier']);
            if(empty($ids)){
                $products = array();
            }else{
                $products = $this->DB->query('SELECT * FROM bo_Articles WHERE IDARTICLE IN ('.implode(',',$ids).')');
            }
            if(isset($_POST['qty'])){
                    
                $price = $_POST['price'];
                $qty = $_POST['qty'];

                foreach($products as $product){
                    $qtys = $qty + $_SESSION['panier'][$product->IDARTICLE] - $_SESSION['panier'][$product->IDARTICLE];
                    $subtot = $price * $qtys;
                } 
            }
            //return $subtot;
        }

        public function total(){
            $total = 0;
            $ids = array_keys($_SESSION['panier']);
            if(empty($ids)){
                $products = array();
            }else{
                $products = $this->DB->query('SELECT * FROM bo_Articles WHERE IDARTICLE IN ('.implode(',',$ids).')');
            }
            foreach ($products as $product){
                $total += $product->PRIXACHATEMBALLAGE * $_SESSION['panier'][$product->IDARTICLE];
            }
            return $total;
        }

        public function add($product_id){
            if(isset($_SESSION['panier'][$product_id])){
                $_SESSION['panier'][$product_id]++;
            }else{
                $_SESSION['panier'][$product_id] = 1;
            }
        }

        public function del($product_id){
            $this->DB->query("DELETE FROM bo_panier WHERE id_article = $product_id AND id_user = ".$_SESSION['id']);
        }
    }
?>