<?php include ('header.php'); ?>

<h2 style=text-align:center><br>Service clientèle</h2>

<p style=text-align:center>Pour toute question, n'hésitez pas à contacter notre service clientèle en remplissant le formulaire ci-dessous.</p>
<div id ="formulaireContact">
<form method="post" action="../view/NousContacter.php">
                    
                        
                            <input type="text" class="text" name="email" placeholder="Votre email" />
                        
                       
                            <input type="text" class="text" name="Objet" placeholder="Objet" />

                            
                            <textarea type="text" class="text" name="Message" placeholder="Message "></textarea>

                        

                        <p style=text-align:center><button type="submit" name="Envoi" value="Envoi">Envoyer</button></p>
</form>
<?php
if ($_POST['Envoi']){

	if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
                  {
                    $passage_ligne = "\r\n";
                  }
                  else
                  {
                    $passage_ligne = "\n";
                  }

			   $to      = 'alexmorand26@gmail.com';
		     $subject = $_POST['Objet'];
		     $message = $_POST['Message'];
		    
		
		     mail($to, $subject, $message);

             header ('Location: ../view/Accueil.php');
}
?>
</div>

<?php include ('footer.php'); ?>