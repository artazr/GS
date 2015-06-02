<?php
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

//création des variables
$prenom = null;
$nom = null;
$email = null;
$password = null;
$password1 = null;
$age = null;
$telephone = null;

$emailconf=null;
$objet=null;
$message=null;
    //Vérification de l'existence des variables
    if (isset($_POST['prenom']) && !empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['email'])&& !empty($_POST['password']) && !empty($_POST['password1']) && !empty($_POST['age']) && !empty($_POST['telephone']) )  
    {
        //Déclaration des variables 
        if ( $_POST['password'] == $_POST['password1'])
              $prenom     = htmlspecialchars($_POST["prenom"]);
              $nom     = htmlspecialchars($_POST["nom"]);
              $email     = htmlspecialchars($_POST["email"]);
              $password      = sha1($_POST["password"]);
              $age     = htmlspecialchars($_POST["age"]);
              $telephone      = htmlspecialchars($_POST["telephone"]);
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO users(prenom, nom, password, email, age, telephone, date_inscription) VALUES(:prenom, :nom, :password, :email, :age, :telephone, CURDATE())');
        $req->execute(array(
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'age' => $age,
            'telephone' => $telephone,
            'password' => $password
            ));
        //Vérification de la similitude du mot de passe
        if (isset($_POST['valider']) && $_POST['password'] == $_POST['password1'])
            {
echo "Vous venez de vous inscrire, Bienvenue !! Un mail vient de vous être envoyé, 
cliquez sur le lien à l'intérieur pour confirmer votre inscription. <br />
Vous allez être redirigé dans 5 secondes . . .";
           
				
			   $to      = $email;
		     $subject = 'confirmation de votre inscription';
		     $message = 'Veuillez cliquer sur le lien ci-dessous pour confirmer votre inscription.';
		     $headers = 'From: alexmorand26@gmail.com' . "\r\n" .
		     'Reply-To: alexmorand26@gmail.com' . "\r\n" .
		     'X-Mailer: PHP/' . phpversion();
		
		     mail($to, $subject, $message, $headers);

             header ('Location: ../view/InscriptionConnexion.php');
	            

            }
        //Vérification de la similitude du mot de passe
       elseif (isset($_POST['valider']) && $_POST['password'] != $_POST['password1'])
        
            {
                echo"tu n'as pas rentré le même mot de passe";

            }
        else
            {
                echo"quelque chose ne vas pas !!";

            }
    }
?>