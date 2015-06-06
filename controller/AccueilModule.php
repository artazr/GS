<?php include('../model/bdd.php');

$reponse = $bdd->query('SELECT * FROM annonce ORDER BY id DESC');

while($donnees = $reponse->fetch())
{
	$rep = $bdd->query("SELECT email, image_name FROM users WHERE email= '".$donnees['prenomPostEmail']."'");

$resultat= $rep->fetch();
?>
	<hr>
<div id="accueil"> 
		Titre de l'annonce : <strong><?php echo $donnees['title'] ?> </strong>
	
	<br /> Nom du Vendeur : <strong><?php echo $donnees['prenomPost'] ?> </strong>
	<br /> Email du Vendeur : <strong><?php echo $donnees['prenomPostEmail'] ?> </strong>
	
	<br /> Nom du produit : <strong><?php echo $donnees['name'] ?> </strong>
	<br /> catégorie de produit : <strong><?php echo $donnees['category'] ?></strong>
	
	<br /> Région de disponibilité : <strong><?php echo $donnees['location'] ?> </strong>
	<br /> Ville où le produit est disponible : <strong> <?php echo $donnees['city'] ?></strong>
	
	<br /> Description du produit : <strong> <?php echo $donnees['description']?> </strong>
</div>
	<div id ="accueilimg">
	 <br /> <img src=" ../controller/<?php  echo $donnees['image_nom'] ?>"/> </strong>
	<!--<br /> <img src=" ../controller/<?php echo $resultat['image_name'] ?>"/> </strong> -->
	 <br />
	 <br />
	</div>
	<div id ="lienPageAnnonce">
	 	<form method="post" action="../controller/annonceModule.php" >
	 <input type="hidden" name="id" value= "<?php echo($donnees['id']) ;?>" />
	 <button type="submit" name="valider">Détail de l'annonce</button>
	</form> <br />
</div>

	 <?php	

}

$reponse->closeCursor();


?>

