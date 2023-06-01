<?php include(VIEWS . '_partials/header.php'); ?>

<h1 class="text-center">Ajouter Adresse</h1>
<?php var_dump($_SESSION['user']); ?>

<form method="post" enctype="multipart/form-data" class="mx-5"> 
    <fieldset>
        <div class="form-group">
        <label for="delivery_address" class="form-label mt-1">Adresse de Livraison</label>
        <input type="text" class="form-control" id="delivery_address"  placeholder="Adresse de livraison" name="delivery_address" value="<?= $_POST['delivery_address'] ?? '' ; ?>">
        <small class="text-danger"><?= $error['delivery_address'] ?? '' ; ?></small>
        </div>
        <div class="form-group">
        <label for="billing_address" class="form-label mt-1">Adresse de Facturation</label>
        <input type="text" class="form-control" id="billing_address"  placeholder="Adresse de Facturation" name="billing_address" value="<?= $_POST['billing_address'] ?? '' ; ?>">
        <small class="text-danger"><?= $error['billing_address'] ?? '' ; ?></small>
        </div>
        <button type="submit" class="my-3 col-12 btn btn-primary">Ajouter l'adresse</button>

    </fieldset>
</form>    

<?php include(VIEWS . '_partials/footer.php'); ?>