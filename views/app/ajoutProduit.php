<?php include(VIEWS . '_partials/header.php'); ?>

<?php 
// var_dump($_POST);
// echo '<br>';
// var_dump($_FILES);
?>
<h1 class="text-center mt-3">Ajout Produit</h1>

<div class="container mt-4">
    <form method="post" enctype="multipart/form-data"> 
    <fieldset>
        <div class="form-group">
        <label for="name" class="form-label mt-4">Nom</label>
        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="nom du produit" name="name" value="<?= $_POST['name'] ?? '' ; ?>">
        <small class="text-danger"><?= $error['name'] ?? '' ; ?></small>
        </div>
        <div class="form-group">
        <label for="category" class="form-label mt-4">Categorie</label>
        <select class="form-select" id="category" name="category">
            <option <?= (isset($_POST['category']) && $_POST['category'] == 'T-shirt')? 'selected' : ''; ?>>T-shirt</option>
            <option <?= (isset($_POST['category']) && $_POST['category'] == 'Chaussures')? 'selected' : ''; ?>>Chaussures</option>
            <option <?= (isset($_POST['category']) && $_POST['category'] == 'Pantalons')? 'selected' : ''; ?>>Pantalons</option>
        </select>
        </div>
        <div class="form-group">
        <label for="image" class="form-label mt-4">Image</label>
        <input class="form-control" type="file" id="image" name="image">
        <small class="text-danger"><?= $error['image'] ?? ""; ?></small>
        </div>
        <div class="form-group">
        <label for="description" class="form-label mt-4">Description</label>
        <textarea class="form-control" id="description" name="description" rows="3"><?= $_POST['description'] ?? ""; ?></textarea>
        </div>
        <small class="text-danger"><?= $error['description'] ?? ""; ?></small>
        <div class="form-group">
        <label for="price" class="form-label mt-4">Prix</label>
        <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" value="<?= $_POST['price'] ?? ""; ?>">
        </div>
        <small class="text-danger"><?= $error['price'] ?? ""; ?></small>
        <button type="submit" class="mt-3 col-12 btn btn-primary">Ajouter</button>
    </fieldset>
    </form>
</div>
<?php include(VIEWS . '_partials/footer.php'); ?>