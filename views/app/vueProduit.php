
<?php include(VIEWS . '_partials/header.php'); ?>

<div class="container">
    <h1 class="text-center"><?= $produit['name']; ?></h1>
    <div class="card text-white bg-primary mb-3">
    <div class="card-header text-center"><img src="<?= UPLOAD . $produit['image']; ?>" alt="" class="img-fluid" ></div>
    <div class="card-body">
        <h4 class="card-title">Categorie : <?= $produit["category"]; ?></h4>
        <h4 class="card-title">Description : </h4>
        <p class="card-text"><?= $produit['description']; ?></p>
        <h5 class="text-end">Prix : <?= $produit['price']; ?>€</h5>
    </div>
    </div>
</div>
<?php include(VIEWS . '_partials/footer.php'); ?>