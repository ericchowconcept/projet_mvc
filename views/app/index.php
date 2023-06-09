<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center text-primary my-3">Bienvenue sur mon site de vente</h1>
<?php 
// echo '<pre>';
//     print_r($produits);
// echo '</pre>';
 if(isset($_SESSION['panier']))
 {echo '<pre>';
    var_dump($_SESSION['panier']);
echo '</pre>';
 }
?>
<div class="container">
    <div class="row justify-content-evenly">
    <?php foreach($produits as $produit): ?>
    <div class="card text-white bg-default mb-3 col-4" >
    <div style="height:300px;">
        <img src="<?= UPLOAD . $produit['image']; ?>" alt="" class="rounded-top" style="object-fit:cover;width:100%;height:100%;">
    </div>
        <div class="card-header"><?= $produit['category']; ?></div>
        <div class="card-body">
            <h4 class="card-title"><?= $produit['name']; ?></h4>
            <p class="card-text"><?= $produit['description']; ?></p>
            <div class="text-center my-2">
                <a href="<?= BASE . 'produit/vue?id=' . $produit['id_product']; ?>" class="btn btn-primary">Détails</a>
                <a href="<?= BASE . 'cart/add?page=accueil&id=' . $produit['id_product']; ?>" class="mt-5"><button class="btn btn-danger">Ajouter au panier</button></a>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    </div>
</div>

<?php include(VIEWS . '_partials/footer.php'); ?>
