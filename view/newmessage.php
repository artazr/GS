<?php include ('header.php'); ?>

 <menu>
    <?php include ('menu.php'); ?>
</menu>
	<div id="info">
	 	<div >
            <div class="title">
                <h2>Rédigez un message</h2>
                <span>Contacter quelqu'un pour avoir plus amples informtaions</span> 
            </div>
           
            <div>
                <!-- Formulaire d'envoi de message-->
                <form method="post" action="../controller/MailModule.php">
                   
                        <div>
                            <input type="text" class="text" name="nom" placeholder="Nom" />
                        </div>
                        <div>
                            <input type="email" class="text" name="email" placeholder="Votre Email" />
                        </div>
                        <div>
                            <input type="email" class="text" name="emaildestinataire" placeholder="Email du destinataire" />
                        </div>
                        <div>
                            <input type="text" class="text" name="objet" placeholder="Objet" />
                        </div>
                        <div >
                            <textarea type="text" class="text" name="message" placeholder="Tapez votre message içi !" /></textarea>
                        </div>
                   
                    
                        <button type="submit" name="valider">Envoyer</button>
                   
                        <!-- Appel de la page php de contact-->
                       <?php include ('../controller/MailModule.php'); ?>
                </form>
            </div>
        </div>     


            </div>
        

    <br />
    

        <?php include ('footer.php'); ?>

