<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$maxsize= 2000000;
$maxwidth = 300;
$maxheight=300;
$erreur = "";
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
        if (!empty($_POST['title']) && !empty($_POST['name'])&& !empty($_POST['category']) && !empty($_POST['location']) && !empty($_POST['city']) && !empty($_POST['description']))
            {
                if ($_FILES['icone']['error'] > 0) {$erreur = "Erreur lors du transfert";}
                
                if ($_FILES['icone']['size'] > $maxsize) {$erreur = "Le fichier est trop gros";}


                $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
                //1. strrchr renvoie l'extension avec le point (« . »).
                //2. substr(chaine,1) ignore le premier caractère de chaine.
                //3. strtolower met l'extension en minuscules.
                $extension_upload = strtolower(  substr(  strrchr($_FILES['icone']['name'], '.')  ,1)  );
                   
                if ( in_array($extension_upload,$extensions_valides) ) {$erreur =  "Extension correcte";}


                $image_sizes = getimagesize($_FILES['icone']['tmp_name']);
                
                if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight) {$erreur = "Image trop grande";}
                //Créer un dossier 
                  mkdir('../images/$_SESSION["userPrenom"]', 0777, true);
                 
                //Créer un identifiant difficile à deviner
                  $image_nom = rand()."-".$_FILES['icone']['tmp_name'];
                //$nom = "avatars/{$id_membre}.{$extension_upload}";
                $resultat = move_uploaded_file($_FILES['icone']['tmp_name'],$image_nom);
                if ($resultat)
                    $erreur = "Votre Annonce à bien été Postée ! ";
       
 $q = 'UPDATE annonce SET image_nom="'.$image_nom.'" WHERE id=LAST_INSERT_ID()';
 $query=$bdd->query($q);
       
                       
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