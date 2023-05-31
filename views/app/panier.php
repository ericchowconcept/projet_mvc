<?php include(VIEWS . '_partials/header.php'); ?>



<div class="container">
<?php if(isset($_SESSION['panier'])):?>

    <h1 class="text-center text-primary my-3">Mon panier</h1>
     <div class="row d-flex align-items-center">
        <?php foreach($detailPanier as $cart): ?>
            <div class="col-5">
                <img src="<?= UPLOAD . $cart['produit']['image']; ?>" alt="" width="100px">
            </div>
            <div class="col-2">
                <h3><?= $cart['produit']['name']; ?></h3>
            </div>
            <div class="col-3 text-center">
                <a href="" class="text-decoration-none">-</a>
                <?= $cart['quantity']; ?>
                <a href="" class="text-decoration-none">+</a>
            </div>
            <div class="col-1 text-end">
                <?= $cart['total'] . "€"; ?>
            </div>
            <div class="col-1 text-end">
                <a href="" class="text-danger"><i class="bi bi-trash3"></i></a>
            </div>
            <div class="col-12 my-3"><hr></div>
       <?php endforeach; ?>     
     </div>  
     <h2 class="text-end"><?= $totalPanier; ?>€</h2> 
     <div class="text-end">
        <a href="#" class="btn btn-primary">Valider</a>
     </div>
</div>
<?php else: ?>
    <h2 class="text-center">Panier vide</h2>   

 <?php endif; ?>







<?php include(VIEWS . '_partials/footer.php'); ?>