<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$query = $bdd->prepare('SELECT nom, prenom, id, admin FROM users ORDER BY id DESC');
$query->execute();

while($user = $query->fetch())
{
    echo($user['nom']." ".$user['prenom']." ".$user['id']." ".$user['admin']);
    echo(" <a href=\"../view/modifierMembre.php?idmembre=".$user['id']."\">modifier</a> <a href=\"../view/supprimerMembre.php?idmembre=".$user['id']."\">supprimer</a>");
    echo "</br>";
}
?>