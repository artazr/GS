<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$user = $bdd->prepare('SELECT prenom, nom, email, age, telephone FROM users WHERE id='.$_SESSION[userID]);
$user -> execute();

$info = $user -> fetch();
?>	
	
