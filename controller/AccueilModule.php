<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$reponse = $bdd->query('SELECT title, name, category, location, city, description FROM annonce ORDER BY id DESC');

while ($donnees = $reponse->fetch())
{
	echo'<hr>';
	echo '<div id="accueil"> Titre de l\'annonce : <strong>'.$donnees['title'] .
	 '</strong><br /> Nom du produit : <strong>'.$donnees['name']. 
	 '</strong><br /> catégorie de produit : <strong>' .$donnees['category'] . 
	 '</strong><br /> Région de disponibilité : <strong>'.$donnees['location']. 
	 '</strong><br /> Ville où le produit est disponible : <strong>' .$donnees['city'] . 
	 '</strong><br /> Description du produit : <strong>'.$donnees['description'].'</strong></div> <br />';
	
}


$reponse->closeCursor();

?>