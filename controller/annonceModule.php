<?php include ('../view/header.php'); ?>


	<div id="annonce">
            <div class="title">
                <h2> Annonce</h2>
                <span>Regardez le détail de l'annonce ! </span> 
            </div>
            <div>
            <?php include('../model/bdd.php'); 
//on inclut la page qui nous permet de nous connecter à la base de donnée
if(isset($_POST['valider']))
{

	$reponse = $bdd->query('SELECT * FROM annonce WHERE id = '.$_POST['id']);

while($donnees = $reponse->fetch())
{
	$rep = $bdd->query("SELECT email, image_name FROM users WHERE email= '".$donnees['prenomPostEmail']."'");

$resultat= $rep->fetch();

{

?>
<div>
	<hr>
<div id="annonce"> 
<div id ="accueilimg2"><img src=" ../controller/<?php echo $resultat['image_name'] ?>" alt="vendeur"/> </strong> 
	 </div>
	<div id ="accueilimg1">
	 <br /> <img src=" ../controller/<?php  echo $donnees['image_nom'] ?>" alt="produit"/> </strong></div>
	

	  <br />

<div id="descriptionAnnonce">
		Titre de l'annonce : <strong><?php echo $donnees['title'] ?> </strong>
	
	<br /> Nom du Vendeur : <strong><?php echo $donnees['prenomPost'] ?> </strong>
	<br /> Email du Vendeur : <strong><?php echo $donnees['prenomPostEmail'] ?> </strong>
	
	<br /> Nom du produit : <strong><?php echo $donnees['name'] ?> </strong>
	<br /> catégorie de produit : <strong><?php echo $donnees['category'] ?></strong>
	
	<br /> Région de disponibilité : <strong><?php echo $donnees['location'] ?> </strong>
	<br /> Ville où le produit est disponible : <strong> <?php echo $donnees['city'] ?></strong>
	
	<br /> Description du produit : <strong> <?php echo $donnees['description']?> </strong>
</div>
	
	 <?php 
	}
}
}
	 ?>


            </div>
        </div>

       <div id="lienPageMessage">
       <a href="../view/newmessage.php"><button type="submit" >envoyer un mail au vendeur</button></a>
			
       </div>
	
</div>
    <br />
    
        <?php include ('../view/footer.php'); ?>
