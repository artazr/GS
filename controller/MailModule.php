<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');
    //Vérification de l'existence des variables
    if (!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['emaildestinataire'])&& !empty($_POST['objet']) && !empty($_POST['message']) )  
    {
              $nom     = htmlspecialchars($_POST["nom"]);
              $email     = htmlspecialchars($_POST["email"]);
              $emaildestinataire     = htmlspecialchars($_POST["emaildestinataire"]);
              $objet      = htmlspecialchars($_POST["objet"]);
              $message      = htmlspecialchars($_POST["message"]);
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO messages(nom, email, emaildestinataire, objet, message) VALUES(:nom, :email, :emaildestinataire, :objet, :message )');
        $req->execute(array(
            'nom' => $nom,
            'email' => $email,
            'emaildestinataire' => $emaildestinataire,
            'objet' => $objet,
            'message' => $message
            )); 
            //Vérification de la similitude du mot de passe
        if (isset($_POST['valider']) && !empty($_POST['email']) && !empty($_POST['nom'])&& !empty($_POST['emaildestinataire']) && !empty($_POST['objet']) && !empty($_POST['message']))
            {
                echo"Votre message à bien été envoyé ! ";
?>
                <script > 
                    // Redirection vers la page d'accueil         
                    setTimeout("location.href = '../view/message.php';", 3000);           
                </script>
<?php
            }
        //Vérification que les champs sont bien tous rempli
              elseif (isset($_POST['valider']) && ($_POST['nom'])==NULL)
        
            {
                echo"Tu as oublié de rentrer ton nom";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/newmessage.php';", 3000);
                </script>
<?php
            }
       elseif (isset($_POST['valider']) && empty($_POST['email']))
        
            {
                echo"Tu as oublié de rentrer ton email";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/newmessage.php';", 3000);
                </script>
<?php
            }
             elseif (isset($_POST['valider']) && empty($_POST['emaildestinataire']))
        
            {
                echo"Tu as oublié de rentrer l'email du destinataire";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/newmessage.php';", 3000);
                </script>
<?php
            }
             elseif (isset($_POST['valider']) && empty($_POST['objet']))
        
            {
                echo"Tu as oublié de rentrer un objet";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/newmessage.php';", 3000);
                </script>
<?php
            }
             elseif (isset($_POST['valider']) && empty($_POST['message']))
        
            {
                echo"Tu as oublié de rentrer le contenu du message";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/newmessage.php';", 3000);
                </script>
<?php
            }
        else
            {
                echo"quelque chose ne vas pas !!";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/InscriptionConnexion.php';", 3000);
                </script>
<?php
            }
    }
?>