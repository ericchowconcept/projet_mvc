<?php include(VIEWS . '_partials/header.php'); ?>

<?php 
echo '<pre>';
    print_r($_POST);
echo '</pre>';

?>

<h1 class="text-center text-primary my-3 ">Inscription</h1>
<div class="container border border-primary rounded mt-4 ">
<form method="post"  action="">
  <fieldset class="row p-4">
      <div class="form-group col-md-6">
        <label for="f_name" class="form-label mt-4">First Name</label>
        <input type="text" class="form-control" id="f_name" name="f_name" value="<?= $_POST['f_name'] ?? ''; ?>" placeholder="Enter your first name">
        <small class="text-danger"><?= $error['f_name'] ?? ""; ?></small>
    </div>
      <div class="form-group col-md-6">
        <label for="l_name" class="form-label mt-4">Last Name</label>
        <input type="text" class="form-control" id="l_name" name="l_name" value="<?= $_POST['l_name'] ?? ''; ?>"  placeholder="Enter your last name">
        <small class="text-danger"><?= $error['l_name'] ?? ""; ?></small>
    </div>
      <div class="form-group col-md-6">
        <label for="pseudo" class="form-label mt-4">Username</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= $_POST['pseudo'] ?? ''; ?>"  placeholder="Enter your last name">
        <small class="text-danger"><?= $error['pseudo'] ?? ""; ?></small>
    </div>
    <div class="form-group col-md-6">
      <label for="email" class="form-label mt-4">Email address</label>
      <input type="text" class="form-control" id="email" name="email" value="<?= $_POST['email']?? ''; ?>" placeholder="Enter email">
      <small class="text-danger"><?= $error['email'] ?? ""; ?></small>
    </div>
    <div class="form-group col-12">
      <label for="password" class="form-label mt-4">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter your password">
      <small class="text-danger"><?= $error['password'] ?? ""; ?></small>

    </div>
    <div class="form-group col-12">
      <label for="checkPwd" class="form-label mt-4">Verify password</label>
      <input type="password" class="form-control" id="checkPwd" placeholder="Enter you password again">
      <small class="text-danger"><?= $error['checkPwd'] ?? ""; ?></small>
    </div>
   
    <button type="submit" class="btn btn-primary my-5 col-12">Subsription</button>
  </fieldset>
</form>
</div>




<?php include(VIEWS . '_partials/footer.php'); ?>