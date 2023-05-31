<?php include(VIEWS . '_partials/header.php'); ?>


<h1 class="text-center text-primary my-3">Gestion User</h1>

<div class="container">
    <table class="table table-default table-striped text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Pseudo</th>
                <th>Role</th>
                <th>Option</th>
            </tr>
        </thead>
            <?php foreach($users as $user): ?>
            <div class="modal fade" role="dialogue" tabindex="-1"  aria-hidden= "true" id="modalSupprimer<?=$user['id_user']; ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supprimer utilisateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Etes-vous sur de vouloir supprimer cet utilisateur ???</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger" href="<?= BASE . 'user/supprimer?id=' . $user['id_user']; ?>">Supprimer</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ne pas supprimer</button>
                </div>
                </div>
            </div>
            </div>        
        <tbody>
            <tr>
                <td><?= $user['id_user']; ?></td>    
                <td><?= $user['f_name']; ?></td>    
                <td><?= $user['l_name']; ?></td>    
                <td><?= $user['email']; ?></td>    
                <td><?= $user['pseudo']; ?></td>    
                <td><?= $user['role']; ?></td>    
                <td>
                    <a href="<?= BASE . 'user/role?id=' . $user['id_user'] . "&role=" . $user['role']; ?>" class="text-primary text-center mx-3"><i class="bi bi-person-fill-gear"></i></a>
                    <a data-bs-toggle="modal" data-bs-target="#modalSupprimer<?=$user['id_user']; ?>" class="text-danger"><i class="bi bi-trash3"></i></a>
                </td>    
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php include(VIEWS . '_partials/footer.php'); ?>