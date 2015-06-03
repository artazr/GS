<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$maxwidth= 1048576;
$maxheight= 1048576;
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

                
               //$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                //$extension_upload = strtolower( strrchr($_FILES['fichier']['name'], '.'));
                   
             //   if ( in_array($extension_upload,$extensions_valides) ) 
               // {

                    
                    //$image_sizes = getimagesize($_FILES['fichier']['tmp_name']);

                   // if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) $erreur = "Image trop grande";

                     // mkdir('images/'.$_SESSION["userPrenom"].'/annonce_upload', 0777, true);

                    // $upload_dir = 'images/'.$_SESSION["userPrenom"].'/annonce_upload';

                     if(is_uploaded_file($_FILES['fichier']['tmp_name']))
                         
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
                                 $message = 'Un annonce à été postée sur notre site et est suceptible de vous interresser';
                                 
    
                                      mail($to, $subject, $message);
                                }



                          }
                          else
                          {
                             
                              $erreur= "fichier non enregistré";
                          }
                    else
                      {

                        $erreur= "fichier non uploadé";
                      }
               // }
               
                       
            }
            elseif ( empty($_POST['title']))
        
            {  
                $erreur = "Tu as oublié de rentrer un titre";
            }
            elseif (empty($_POST['name']))
        
            {
                $erreur ="Tu as oublié de rentrer un nom";
            }
             elseif (empty($_POST['category']))
        
            {
                $erreur ="Tu as oublié de rentrer la catégorie du produit";
            }
             elseif (empty($_POST['location']))
        
            {
                $erreur ="Tu as oublié de rentrer la région dans laquelle sera disponible ton annonce";
            }
             elseif (empty($_POST['city']))
        
            {
                $erreur ="Tu as oublié de rentrer la ville dans laquelle sera disponible ton annonce";
            }
            elseif (empty($_POST['description']))
        
            {
                $erreur ="Tu as oublié de rentrer une description de ton annonce";
            }
            else
            {
                $erreur ="quelque chose ne vas pas !!";
                
            }
    }
    include('../view/PosterAnnonce.php');
?>