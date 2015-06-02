<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

echo $_GET['idmembre'];

$user = $bdd->prepare('DELETE FROM users WHERE id='.$_GET['idmembre']);
$user -> execute();

?>	