<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');


$erreur = "remplissez bien tous les champs ;)";



    //Vérification de l'existence des variables
    if (isset($_POST['upload']))  
    {
              $title     = htmlspecialchars($_POST["title"]);
              $name     = htmlspecialchars($_POST["name"]);
              $category     = htmlspecialchars($_POST["category"]);
              $location      = htmlspecialchars($_POST["location"]);
              $city      = htmlspecialchars($_POST["city"]);
              $description      = htmlspecialchars($_POST["description"]);
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO annonce(title, name, prenomPost, prenomPostEmail, category, location, city, description, date_mise_en_ligne, image_nom) VALUES(:title, :name, :prenomPost, :prenomPostEmail, :category, :location, :city, :description, CURDATE(), :image_nom)');

        if (!empty($_POST['title']) && !empty($_POST['name']) && !empty($_POST['category']) && 
          !empty($_POST['location']) && !empty($_POST['city']) && !empty($_POST['description']) )
            {
                $req->execute(array(
            'title' => $title,
            'name' => $name,
            'prenomPost'=>$_SESSION['userPrenom'],
            'prenomPostEmail'=>$_SESSION['userMail'],
            'category' => $category,
            'location' => $location,
            'city' => $city,
            'description'=> $description,
            'image_nom'=>$_FILES['fichier']['name']
            )); 

                
               $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                $extension_upload = strtolower( strrchr($_FILES['fichier']['name'], '.'));
                   
              if ( in_array($extension_upload,$extensions_valides) ) 
               {
                 
                          if(move_uploaded_file($_FILES['fichier']['tmp_name'], $_FILES['fichier']['name']))
                          {

                              $erreur = "Votre Annonce à bien été Postée ! ";

                              $reponse = $bdd->query('SELECT * FROM recherche_annonce ');
                              $donnees = $reponse->fetch();
                            if($donnees['recherche_annonce']==$title || $donnees['recherche_annonce']==$name )
                                {

                                  if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
                                        {
                                          $passage_ligne = "\r\n";
                                        }
                                        else
                                        {
                                          $passage_ligne = "\n";
                                        }
                                  $to      = $donnees['email'];
                                 $subject = 'Annonce postée suceptible de vous interresser';
                                 $message = 'Un annonce à été postée sur notre site et est suceptible de vous interresser'.$passage_ligne.'
                                 Rendez vous sur greenswitch !! ';
                                
                                    mail ($destinataire, $sujet, $message); // on envois le mail   
                                }
                          }
                          else
                          {
                             
                              $erreur= "fichier non enregistré";
                          }
                        
                }
            }
    }
    include('../view/PosterAnnonce.php');
?>