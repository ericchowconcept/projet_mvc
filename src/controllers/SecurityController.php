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
            }

            if(!error)
            {
                
            }

        }
        include(VIEWS . 'security/inscription.php');
    }

}


?>