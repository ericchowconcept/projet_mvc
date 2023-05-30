<?php 





class SecurityController
{
    public static function inscription()
    {
        if(!empty($_POST))
        {
            $error = [];
            function valid_pass($candidate)
            {
                $r1 = '/[A-Z]/';  //Uppercase
                $r2 = '/[a-z]/';  //lowercase
                $r3 = '/[!@#$%^&*()\-_=+{};:,<.>]/';  // whatever you mean by 'special char'
                $r4 = '/[0-9]/';  //numbers
                
                if (preg_match_all($r1, $candidate, $o) < 1) return FALSE;

               if (preg_match_all($r2, $candidate, $o) < 1) return FALSE;

                if (preg_match_all($r3, $candidate, $o) < 1) return FALSE;

                if (preg_match_all($r4, $candidate, $o) < 1) return FALSE;

               if (strlen($candidate) < 5) return FALSE;

                return TRUE;
            }

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
            if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) || User::findByEmail(['email'=> $_POST['email']]))
            {
                if(User::findByEmail(['email'=> $_POST['email']]))
                {
                  $_SESSION['messages']['danger'][] = "Un compte est déjà existant à cette adresse mail, veuillez procèder à la récupération du mot de passe";
                  $error['email'] = "";
                }else
                {
                    $error['email'] = "le champs email est obligatoire et l'adresse email doit être validé";
                }
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
                if(empty($_POST['checkPwd']) || $_POST['password'] !=$_POST['checkPwd'])
                {
                    $error['checkPwd'] = 'le champ est obligatoire et les mots de passe doivent concorder';
                }
            }
            if(!$error)
            {
                $mdp = password_hash($_POST['password'], PASSWORD_DEFAULT);
                
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

}


?>