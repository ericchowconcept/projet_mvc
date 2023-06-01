<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center text-primary my-4">Votre commande</h1>


<div class="container">
    <div class="row">
        <div class="col-4">
            <h2>Adresse de livraison</h2>
        <p><?= $_SESSION['user']['f_name']; ?><?= $_SESSION['user']['l_name']; ?></p>
            <p><?= $_SESSION['user']['phone']; ?></p>
            <?= $_SESSION['user']['delivery_address']; ?>
        </div>
        <div class="col-4">
            <h2>Adresse de Facturation</h2>
            <p><?= $_SESSION['user']['f_name']; ?><?= $_SESSION['user']['l_name']; ?></p>
            <p><?= $_SESSION['user']['phone']; ?></p>
            <p><?= $_SESSION['user']['billing_address']; ?></p>
        </div>
        <div class="col-2 text-end">
            <a href="<?= BASE . 'commande/formulaire'; ?>" class="btn btn-info text-end">Modifier</a>
        </div>
    </div>
    <div class="col-12 my-3"><hr></div>
</div>


<!-- test panier -->
<div class="container">
<?php if(isset($_SESSION['panier'])):?>
     <div class="row d-flex align-items-center">
        <?php foreach($detailPanier as $cart): ?>
            <div class="col-3">
                <img src="<?= UPLOAD . $cart['produit']['image']; ?>" alt="" width="100px">
            </div>
            
            <div class="col-5 text-center">
                <h3><?= $cart['produit']['name']; ?></h3>
            </div>
            <div class="col-3 text-center">
                <a href="<?= BASE . 'cart/substract?id=' . $cart['produit']['id_product']; ?>" class="text-decoration-none">-</a>
                <?= $cart['quantity']; ?>
                <a href="<?= BASE . 'cart/add?page=panier&id=' . $cart['produit']['id_product']; ?>" class="text-decoration-none">+</a>
            </div>
           
            <div class="col-12 my-3"><hr></div>
       <?php endforeach; ?>     
     </div>  
     <h2 class="text-end"><?= $totalPanier; ?>€</h2> 
  
</div>    
<?php endif; ?>



<div class="col-2 text-end">
            <a href="<?= BASE . 'commande/pay'; ?>" class="btn btn-info text-end">Payer</a>
        </div>


<?php include(VIEWS . '_partials/footer.php'); ?>