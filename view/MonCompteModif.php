<?php include ('header.php'); ?>

 <menu>
    <?php include ('menu.php'); ?>
</menu>
	<div id="info">
	 	<div >
            <div class="title">
                <h2>Mes informations</h2>
                <span>Complétez vos informations pour un profil complet !</span> 
            </div>
            <div >
                    <?php include ('../controller/MonCompteModifModule.php'); ?>
                <span>Vos informations ont été changées avec succès.</span> 
                
            </div>
        </div>
	</div>

    <br />
    

        <?php include ('footer.php'); ?>

