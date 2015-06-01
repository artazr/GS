<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');
  
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO messages(nom, email, emaildestinataire, objet, message) VALUES(:nom, :email, :emaildestinataire, :objet, :message )');
        $req->execute(array(
            'nom' => $_SESSION['userPrenom'],
            'email' => $_SESSION['userMail'],
            'emaildestinataire' => $_POST['mail'],
            'objet' => 'Bonjour, je suis intéréssé par votre annonce concerant ',
            'message' => 'blabla bla'
            )); 
            
        if (isset($_POST['valider']))
            {
                header ('Location: ../view/Accueil.php');
            }
        else{
            echo 'erreur';
        }
    
?>