<?php include ('header.php'); ?>

<div id="presentation">
<div id="carrousel">
    <ul>
        <li><img src="http://upload.wikimedia.org/wikipedia/commons/b/b1/Male_mallard_standing.jpg" height="100%" width="100%" /></li>
    <li><img src="http://www.automobile-magazine.fr/var/automobile_magazine/storage/images/actualites/scoops/bmw/futur_bmw_x3/2009504-1-fre-FR/futur_bmw_x3_reference.jpg" height="100%" width="100%"/></li>
    <li><img src="http://www.moto-scooter-reparation-beauvais.fr/img/photos/zoom/01.jpg" height="100%" width="100%" /></li>
    </ul>
</div>
<!-- on inclut la bibliothèque depuis les serveurs de Google -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>$(document).ready(function(){
    
var $carrousel = $('#carrousel'), // on cible le bloc du carrousel
    $img = $('#carrousel img'), // on cible les images contenues dans le carrousel
    indexImg = $img.length - 1, // on définit l'index du dernier élément
    i = 0, // on initialise un compteur
    $currentImg = $img.eq(i); // enfin, on cible l'image courante, qui possède l'index i (0 pour l'instant)

$img.css('display', 'none'); // on cache les images
$currentImg.css('display', 'block'); // on affiche seulement l'image courante

$carrousel.append('<div class="controls"> <span class="prev">Precedent</span> <span class="next">Suivant</span> </div>');

$('.next').click(function(){ // image suivante

    i++; // on incrémente le compteur

    if( i <= indexImg ){
        $img.css('display', 'none'); // on cache les images
        $currentImg = $img.eq(i); // on définit la nouvelle image
        $currentImg.css('display', 'block'); // puis on l'affiche
    }
    else{
        i = indexImg;
    }

});

$('.prev').click(function(){ // image précédente

    i--; // on décrémente le compteur, puis on réalise la même chose que pour la fonction "suivante"

    if( i >= 0 ){
        $img.css('display', 'none');
        $currentImg = $img.eq(i);
        $currentImg.css('display', 'block');
    }
    else{
        i = 0;
    }

});

function slideImg(){
    setTimeout(function(){ // on utilise une fonction anonyme
                        
        if(i < indexImg){ // si le compteur est inférieur au dernier index
        i++; // on l'incrémente
    }
    else{ // sinon, on le remet à 0 (première image)
        i = 0;
    }

    $img.css('display', 'none');

    $currentImg = $img.eq(i);
    $currentImg.css('display', 'block');

    slideImg(); // on oublie pas de relancer la fonction à la fin

    }, 4000); // on définit l'intervalle à 2000 millisecondes (7s)
}

slideImg(); // enfin, on lance la fonction une première fois

});
</script>
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

