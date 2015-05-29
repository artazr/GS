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
                $_SESSION["userMail"] = $_POST["email"];
                //echo'<meta http-equive="refresh" content=0; url="Location:../view/Accueil.php">'; 
                include('../view/Accueil.php');
                //echo'<br />Vous venez de vous connecter, vous êtes l\'utilisateur numéro '.$resultat["id"]; 
                //echo'<br /> Cliquez sur le bouton : <a href="../view/Accueil.php"><button>Accueil</button></a>';

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