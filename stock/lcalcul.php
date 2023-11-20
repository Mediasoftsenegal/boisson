<?

// calcul des sortie de stocks
function fsortiestock($idarticle,$dateinvert){
    $DB = new DB();
    $sql="SELECT sum(bo_sortiestock.quantite) as totsortie FROM bo_sortiestock WHERE bo_sortiestock.IDARTICLE= $idarticle AND bo_sortiestock.Date_sortie >= $dateinvert.";
    $data = array(
        ":idarticle" => $idarticle,  
        ":Date_sortie" => $dateinvert, 
    );
    $result= $DB->query($sql, $data);
    foreach ($result as $sorttock):
       {
        $tsortie= $sorttock->totsortie; 
       } 
    endforeach;
    return $tsortie; 
}
 // calcul des entree de stocks
    function fentreestock($idarticle,$dateinvert){
        $DB = new DB();
        $sql="SELECT  bo_Stock_Depot.id_article, sum(bo_Stock_Depot.qte_achetee) AS totachat,bo_Stock_Depot.Datemaj 
        FROM bo_Stock_Depot
        WHERE bo_Stock_Depot.id_article= $idarticle 
        AND bo_Stock_Depot.Datemaj >= $dateinvert."; 
      
        $data = array(
            ":idarticle" => $idarticle,  
            ":Date_appro" => $dateinvert, 
             );
             
        $result= $DB->query($sql, $data);
        foreach ($result as $entrestock):
           {
            $tentree= $entrestock->totachat; 
           } 
        endforeach;
        return $tentree; 
 }

 // calcul des vente de stocks
  function fventestock($idarticle,$dateinvert){
      $DB = new DB();
      $sql="SELECT bo_ligne_factures.id_article,sum(bo_ligne_factures.quantite) as totvente, bo_factures.Date_factures
      FROM bo_ligne_factures,bo_factures
      WHERE bo_ligne_factures.id_article= $idarticle 
      AND bo_ligne_factures.Id_facture=bo_factures.Id_facture
      AND bo_factures.Date_factures >=  $dateinvert.";

      $data = array(
        ":idarticle" => $idarticle,  
        ":Date_factures" => $dateinvert, 
        );
        $result= $DB->query($sql, $data);
        foreach ($result as $ventestock):
          {

          $tvente= $ventestock->totvente;
          
          } 
      endforeach;
        
        return $tvente;
      }
  // calcul des vente de stocks
function fextractact() {
  //  $DB =new DB();
  //  $sql ="SELECT bo_ligne_appro.id_article,bo_ligne_appro.quantite FROM bo_ligne_appro";

   // $data = array(
  //      ":idarticle" => explode();
  //  )

}

 ?>