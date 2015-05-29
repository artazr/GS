<?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

$reponse = $bdd->query('SELECT message, email, emaildestinataire, objet FROM messages ');



while ($donnees = $reponse->fetch())

	if($_SESSION['userMail']==$donnees['emaildestinataire']){
{
	echo'<hr>';
	echo $_SESSION['userMail'];
	echo '<div id="recu"> Vous avez reçu un message de : <strong>' .$donnees['email'] .
	'</strong><br /> Objet : <strong>'.$donnees['objet']. 
	'</strong><br /> Message : <strong>' .$donnees['message'] . 
	'</strong><br /> <br />';
}
}
$reponse->closeCursor();

?>