<?php include ('header.php'); ?>

<div id="presentation">
    <h2> Carrousel</h2>
<p>Bonjour et bienvenue sur notre site de partage et de troc de fruit et légumes.
Vous pouvez poster des annonces sur des produits que vous voulez vendre et rechercher les produits de votre choix.
</p>
</div>
	<div id="annonce">
	 	<div >
            <div class="title">
                <h2>Les Annonces</h2>
                <span>Regardez si il y a des annonces qui vous interessent ! =)</span> 
            </div>
            <div >
                    <ul>
                        <li>
                            <?php include ('../controller/AccueilModule.php'); ?>
                        </li>
                    </ul> 
            </div>
        </div>
	</div>

    <br />
    
        <?php include ('footer.php'); ?>

