<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$reponse = $bdd->query('SELECT * FROM annonce ');


echo'<strong>Mes annonces Postées</strong>';

while ($donnees = $reponse->fetch())
	if($_SESSION['userPrenom']==$donnees['prenomPost']){
{
	
	echo'<hr>';
	echo '</strong> nom de l\'annonce: <strong>'.$donnees['name']. 
	'</strong><br /> description de l\'annonce : <strong>' .$donnees['description'] . 
	'</strong><br /> <br />';
}
}
$reponse->closeCursor();

?>