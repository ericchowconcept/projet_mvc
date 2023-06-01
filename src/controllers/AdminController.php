<?php 

class AdminController
{
    // !version vincent - ajout,modifier et gestion produit ici au lieu de app controller
    public static function gestionUser()
    {
        $users = User::findAll();
        include(VIEWS."admin/gestionUser.php" ) ;
    }

    public static function deleteUser()
    {
        Verif::admin();
        if(!empty($_GET['id']))
        {
            User::delete(['id_user' => $_GET['id']]);
            $_SESSION['messages']['danger'][] = "L'utilisateur a été bien supprimé!!!";
        }
        header('location:' . BASE . 'user/gestion');
        exit;
    }
    public static function modifierRole()
    {
        Verif::admin();
        if(!empty($_GET['id']) && !empty($_GET['role']))
        {
            if($_GET['role'] == 'ROLE_USER')
            {
                $role = "ROLE_ADMIN";
            }else
            {
                $role = "ROLE_USER";
            }
            User::modifierRole([
                'role' => $role,
                'id_user' => $_GET['id']
            ]);
            $_SESSION['messages']['success'][]="L'utilisateur d'id $_GET[id] a maintenant le role : $role";
        }
        header('location:' . BASE . 'user/gestion');
        exit;
       
    }
}

?>

