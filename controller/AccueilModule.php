<?php include('../model/bdd.php');

$reponse = $bdd->query('SELECT * FROM annonce ORDER BY id DESC');


while ($donnees = $reponse->fetch())
{

	echo'<hr>';
	echo '<div id="accueil"> Titre de l\'annonce : <strong>'.$donnees['title'] .
	
	'</strong><br /> Nom du Vendeur : <strong>'.$donnees['prenomPost'].
	'</strong><br /> Email du Vendeur : <strong>'.$donnees['prenomPostEmail'].
	'</strong><br /> <img src=" ../controller/'.$donnees['image_nom'].'"/>
	</strong><br /> Nom du produit : <strong>'.$donnees['name']. 
	'</strong><br /> catégorie de produit : <strong>' .$donnees['category'] . 
	
	'</strong><br /> Région de disponibilité : <strong>'.$donnees['location'].
	'</strong><br /> Ville où le produit est disponible : <strong>' .$donnees['city'].
	
	'</strong><br /> Description du produit : <strong>'.$donnees['description'].'</strong>'; 

	 ?>
	 <br />
	 <br />
	
	 	<form method="post" action="../view/annonce.php" >
	 <input type="hidden" name="id" value= "<?php echo($donnees['id']) ;?>" />
	 <button type="submit" name="valider">Détail de l'annonce</button>
	</form></div> <br />
	 <?php	
}


$reponse->closeCursor();

?>

