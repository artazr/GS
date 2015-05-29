<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$reponse = $bdd->query('SELECT admin, nom, prenom FROM users ORDER BY id DESC');
while ($donnees = $reponse->fetch())
			{
				if($donnees['admin']==1)
				{
					echo'<hr>';
					echo "<div> nom : <strong>".$donnees['nom']." prénom : ".$data['prenom']."</strong>";
				}
}


$reponse->closeCursor();

?>