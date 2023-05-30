<?php include(VIEWS . '_partials/header.php'); ?>



<div class="container">
    <form action="" class=" w-50 mx-auto border border-primary rounded mt-5 p-5" method="post">
        <h1 class="text-center text-primary">Connexion</h1>
        <div class="form-group">
            <label for="email" class="form-label mt-4">Email address</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $_POST['email']?? ''; ?>" placeholder="Enter email">
            <small class="text-danger"><?= $error['email'] ?? ""; ?></small>
        </div>
        <div class="form-group">
            <label for="password" class="form-label mt-4">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            <small class="text-danger"><?= $error['password'] ?? ""; ?></small>
        </div>
        <button class="btn btn-primary my-4 w-100" type="submit">Se connecter</button>

    </form>
</div>

<?php include(VIEWS . '_partials/footer.php'); ?>