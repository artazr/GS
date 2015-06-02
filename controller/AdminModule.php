<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$query = $bdd->prepare('SELECT nom, prenom, id, admin FROM users ORDER BY id DESC');
$query->execute();

while($user = $query->fetch())
{
	echo'<div id="AdminModule">';
	
    echo("Nom : <strong>".$user['nom']."</strong>  &nbsp;&nbsp;&nbsp;&nbsp;   Prenom : <strong>".$user['prenom']."</strong>  &nbsp; &nbsp;&nbsp;&nbsp;  ID : <strong>".$user['id']."</strong>  &nbsp; &nbsp;&nbsp;&nbsp;  Admin :  <strong>".$user['admin']."</strong>");
   
   
    echo(" <a href=\"../view/modifierMembre.php?idmembre=".$user['id']."\"><button>modifier</button></a> <a href=\"../view/supprimerMembre.php?idmembre=".$user['id']."\"><button>supprimer</button></a>");
    echo "</div></br>";
}
?>