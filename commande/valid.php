<?php require '../page/header.php'; ?>
<div class="text-center">
    <h1>Générer une facture ?</h1>
    <a href="facture.php?<?= $_SERVER["QUERY_STRING"] ?>" class="btn btn-success btn-large">OUI</a>
    <a href="bon.php?<?= $_SERVER["QUERY_STRING"] ?>" class="btn btn-danger btn-large">NON</a>
</div>
<?php require '../page/footer.php'; ?>