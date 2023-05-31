<?php 





class SecurityController
{
   
    public static function inscription()
    {   
        // *Vérifier le formulaire a été envoyé
        if(!empty($_POST))
        {   
            //* on initialise notre tableau d'erreur
            $error = [];
            // *fonction permettant de vérifier la conformiter du mdp
            function valid_pass($candidate)
            {
                $r1 = '/[A-Z]/';  //Uppercase
                $r2 = '/[a-z]/';  //lowercase
                $r3 = '/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
                $r4 = '/[0-9]/';  //numbers
                
            //     if (preg_match_all($r1, $candidate, $o) < 1) return FALSE;

            //    if (preg_match_all($r2, $candidate, $o) < 1) return FALSE;

            //     if (preg_match_all($r3, $candidate, $o) < 1) return FALSE;

            //     if (preg_match_all($r4, $candidate, $o) < 1) return FALSE;

            //    if (strlen($candidate) < 5) return FALSE;

                return TRUE;
            }
            // *effectuer les differents control des inputs du formulaire d'inscription
            if(empty($_POST['f_name']) || preg_match('#[0-9]#', $_POST['f_name']))
            {
                $error['f_name'] = "le champs est obligatoire et doit contenir uniquement des lettres";
            }
            if(empty($_POST['l_name']) || preg_match('#[0-9]#', $_POST['l_name']))
            {
                $error['l_name'] = "le champs est obligatoire et doit contenir uniquement des lettres";
            }
            if(empty($_POST['pseudo']))
            {
                $error['pseudo'] = "le champs est obligatoire";
            }

            // *on vérifie que l'email soit valide(@ et .quelqueschose) et que l'email existe dans le BDD
            if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || User::findByEmail(['email'=> $_POST['email']]))
            {
                // *Si email existe déjà en bdd
                if(User::findByEmail(['email'=> $_POST['email']]))
                {
                  $_SESSION['messages']['danger'][] = "Un compte est déjà existant à cette adresse mail, veuillez procèder à la récupération du mot de passe";
                  $error['email'] = "";
                }else
                {
                    $error['email'] = "le champs email est obligatoire et l'adresse email doit être validé";
                }
                // *on verifie le pattern pour le mdp n'a été respecter, pas de majuscule/minuscule ou pas de chiffre ou pas de caractère spécial ou mdp trop court
                if(empty($_POST['password']) || !valid_pass($_POST['password'])) 
                {
                    $error['password'] = "le champs est obligatoire et votre mot de passe doit contenir: 
                    <ul>
                        <li>une majuscule</li>
                        <li>minuscule</li>
                        <li>un chiffre</li> 
                        <li>un caractçre spécial</li> 
                        <li>doit faire plus de 4 caractères</li>
                    </ul>";
                }
                // *si les mdp sont différents
                if(empty($_POST['checkPwd']) || $_POST['password'] !=$_POST['checkPwd'])
                {
                    $error['checkPwd'] = 'le champ est obligatoire et les mots de passe doivent concorder';
                }
            }

            // *si notre tableau d'erreur est rester vide (donc si on a aucune erreur)
            if(!$error)
            {
                //* on hash le mdp
                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
                //* on envoie les infos en BDD
                User::ajouter([
                    'f_name' => $_POST['f_name'],
                    'l_name' => $_POST['l_name'],
                    'pseudo' => $_POST['pseudo'],
                    'email' => $_POST['email'],
                    'password' => $mdp
                ]);

                $_SESSION['messages']['success'][] = "Félicitations, vous êtes à présent inscrit. Connectez-vous!!";
                header('location:' . BASE);
                exit;
            }
        }
        include(VIEWS . 'security/inscription.php');
    }
    public static function login()
    {
        // *on vérifie que le formulaire est envoyé
        if(!empty($_POST))
        {
            // *on stocke le potentiel utilisateur trouvé dans la BDD à l'aide de son email 
            $user = user::findByEmail(['email' => $_POST['email']]);

            // *si un utilisateur en BDD a bien le mail taper dans l'input(si la variable $user n'est pas vide)
            if($user)
            {
                // *on vérifie le mdp tapé par l'utilisateur correspond au mdp dans la BDD
                if(password_verify($_POST['password'], $user['password']))
                {
                    // *on stock le user dans la SESSION à l'indice 'user'
                    $_SESSION['user'] = $user;
                    $_SESSION['messages']['success'][] = "Bienvenue " . $user['pseudo'] . "!!";
                    header('location:' . BASE);
                    exit;
                }
                else
                {
                    $_SESSION['messages']['danger'][] = "Erreur sur le mot de passe";
                }
            }else
            {
                $_SESSION['messages']['danger'][] = "Aucun compte existant à cette adresse mail";
            }
        }
        include(VIEWS . 'security/login.php');
    }
    public static function logout()
    {
        // *on supprime tout ce qui est stocké dans la session avec l'indice 'user' (=deconnecter l'utilisateur)
        unset($_SESSION['user']);

        $_SESSION['messages']['info'][] = "A bientôt !!";
        header('location:' . BASE);
        exit;
    }
}


?>