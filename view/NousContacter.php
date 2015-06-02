<?php include ('header.php'); ?>

<h2 style=text-align:center><br>Service clientèle</h2>

<p style=text-align:center>Pour toute question, n'hésitez pas à contacter notre service clientèle en remplissant le formulaire ci-dessous.</p>
<div id ="formulaireContact">
<form method="post" action="../controller/PosterAnnonceModule.php">
                    
                        
                            <input type="text" class="text2" name="title" placeholder="Votre email" />
                        
                       
                            <input type="text" class="text2" name="name" placeholder="    Objet" />

                            
                            <textarea type="text" class="text" name="description" placeholder="   Message "></textarea>

                        </form>

                        <p style=text-align:center><button type="submit" name="upload" value="Uploader">Envoyer</button></p>


</div>

<?php include ('footer.php'); ?>