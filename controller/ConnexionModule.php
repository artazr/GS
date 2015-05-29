<?php

include('../model/bdd.php');


$resultat = null;
    if (isset($_POST['email']) && !empty($_POST['email']) && !empty($_POST['password']) )  
    {
        if ( isset($_POST['password']))
        {
            $email = htmlspecialchars($_POST["email"]);
            // Criptage du mot de passe
            $password = sha1($_POST['password']);
            // Vérification des identifiants
                $req = $bdd->prepare('SELECT id FROM users WHERE email = :email AND password = :password');
                $req->execute(array(
                    'email' => $email,
                    'password' => $password));
                $resultat = $req->fetch();

        }
        if ($resultat!=NULL) {
              
                $_SESSION["userID"] = $resultat["id"];
                //echo'<meta http-equive="refresh" content=0; url="Location:../view/Accueil.php">'; 
                echo'<br />Veuillez recliquer sur le bouton "Se connecter" pour vous connecter';  
                echo '   '.$resultat["id"];
                header('Location: ../Accueil.php');

                /*$admin = $bdd->query('SELECT admin  FROM users WHERE email = :email AND password = :password');
                    if($admin==1)
                    {
                        $_SESSION['adminID']= $admin; 
                    }

            $admin->closeCursor();*/
        }

        elseif (!$resultat)
        {
            echo "Mauvais identifiant ou mot de passe ! ";
            
        }

          
    }
?>