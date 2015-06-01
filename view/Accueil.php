<?php include ('header.php'); ?>

<div id="presentation">
 
        <div id="galerie">
            <div class="slider">
            <!-- différentes images du slider -->
            <img src="banane.jpg"/>
            <img src="carotte.jpg"/>
            <img src="pomme.jpg"/>
            <img src="pomme.jpg"/>
            <img src="carotte.jpg"/>
            <img src="raisin.jpg"/>
            <img src="pomme.jpg"/>
            </div>
            <!-- div de l'élément "flèche suivant" -->
            <div class="suiv"></div>
            <!-- div de l'élément "flèche précédent" -->
            <div class="prec"></div> 
        </div>
        <br />
        <br />
<p><strong>Bonjour et bienvenue sur notre site de partage et de troc de fruits et légumes.
Vous pouvez poster des annonces sur des produits que vous voulez vendre et rechercher les produits de votre choix.</strong>
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

