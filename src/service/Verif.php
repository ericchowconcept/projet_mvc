<?php 

class Verif
{
    public static function admin()
    {
        // *on vérifie que l'utilisateur n'est pas connecté mais n'est pas admin
        if(!isset($_SESSION['user']) || $_SESSION['user']['role'] != "ROLE_ADMIN")
        {
            // *dans ce cas, on le renvoie à l'accueil
            header('location:'. BASE);
            exit;
        }
    }
}

?>