<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');
    //Vérification de l'existence des variables
    if (!empty($_POST['title']) && !empty($_POST['name']) && !empty($_POST['category'])&& !empty($_POST['location']) && !empty($_POST['city']) && !empty($_POST['description']) )  
    {
              $title     = htmlspecialchars($_POST["title"]);
              $name     = htmlspecialchars($_POST["name"]);
              $category     = htmlspecialchars($_POST["category"]);
              $location      = htmlspecialchars($_POST["location"]);
              $city      = htmlspecialchars($_POST["city"]);
              $description      = htmlspecialchars($_POST["description"]);
              
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO annonce(title, name, category, location, city, description, date_mise_en_ligne) VALUES(:title, :name, :category, :location, :city, :description, CURDATE())');
        $req->execute(array(
            'title' => $title,
            'name' => $name,
            'category' => $category,
            'location' => $location,
            'city' => $city,
            'description'=> $description
            )); 
            
            
 
         
            //Vérification de la similitude du mot de passe
        if (isset($_POST['upload']) && !empty($_POST['title']) && !empty($_POST['name'])&& !empty($_POST['category']) && !empty($_POST['location']) && !empty($_POST['city']) && !empty($_POST['description']))
            {
	            $content_dir = '../images'; // dossier où sera déplacé le fichier

			    $tmp_file = $_FILES['fichier']['tmp_name'];
			
			    // on vérifie maintenant l'extension
			    $type_file = $_FILES['fichier']['type'];
			
		    if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
			    {
			        exit("Le fichier n'est pas une image");
			    }
			
			    // on copie le fichier dans le dossier de destination
			    $name_file = $_FILES['fichier']['name'];
			
                echo"Votre Annonce à bien été Postée !";
                
                
                
?>
                <script > 
                    // Redirection vers la page d'accueil         
                    setTimeout("location.href = '../view/PosterAnnonce.php';", 3000);           
                </script>
<?php
            }
        //Vérification que les champs sont bien tous rempli
              elseif (isset($_POST['valider']) && ($_POST['title'])==NULL)
        
            {
                echo"Tu as oublié de rentrer un titre";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/PosterAnnonce.php';", 3000);
                </script>
<?php
            }
       elseif (isset($_POST['valider']) && empty($_POST['name']))
        
            {
                echo"Tu as oublié de rentrer un nom";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/PosterAnnonce.php';", 3000);
                </script>
<?php
            }
             elseif (isset($_POST['valider']) && empty($_POST['category']))
        
            {
                echo"Tu as oublié de rentrer la catégorie du produit";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/PosterAnnonce.php';", 3000);
                </script>
<?php
            }
             elseif (isset($_POST['valider']) && empty($_POST['location']))
        
            {
                echo"Tu as oublié de rentrer la région dans laquelle sera disponible ton annonce";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/PosterAnnonce.php';", 3000);
                </script>
<?php
            }
             elseif (isset($_POST['valider']) && empty($_POST['city']))
        
            {
                echo"Tu as oublié de rentrer la ville dans laquelle sera disponible ton annonce";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/PosterAnnonce.php';", 3000);
                </script>
<?php
            }
            elseif (isset($_POST['valider']) && empty($_POST['description']))
        
            {
                echo"Tu as oublié de rentrer une description de ton annonce";
?>
                <script >
                    // Redirection vers la page d'Inscription 
                    setTimeout("location.href = '../view/PosterAnnonce.php';", 3000);
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
    }
?>