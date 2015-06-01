<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');
if($_POST['valider'])
{
	$reponse = $bdd->prepare('SELECT * FROM annonce WHERE id= "$_POST['id']"');
	$resultat=$reponse->fetch();



		echo'<hr>';
		echo '<div id="accueil"> Titre de l\'annonce : <strong>'.$resultat['title'] .
		
		 '</strong><br /> Nom du Vendeur : <strong>'.$resultat['prenomPost'].
		 '</strong><br /> Email du Vendeur : <strong>'.$resultat['prenomPostEmail'].
		 '</strong><br /> Nom du produit : <strong>'.$resultat['name']. 
		'</strong><br /> catégorie de produit : <strong>' .$resultat['category'] . 
		 '</strong><br /> Région de disponibilité : <strong>'.$resultat['location'].'</strong>'
		'</strong><br /> Ville où le produit est disponible : <strong>' .$resultat['city'] .
		 '</strong><br /> <img src=" ../controller/'.$resultat['image_nom'].'"/>
		 </strong><br /> Description du produit : <strong>'.$resultat['description'].'</strong>'; 
}
else{

}
	 ?>