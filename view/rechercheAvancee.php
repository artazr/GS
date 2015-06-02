<?php include ('header.php'); ?>

//on met ça ou?????
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

 <div id="rechercheAvancee">
       
            <div class="title">
                <h2>Recherche Avancée</h2>
                <span>Effectuez ici vos recherches par filtres</span> 
            </div>
                
 <form method="GET" action="rechercheAvancee.php">
        <input type="text" class="text" name="words" placeholder="Titre de l'annonce" />
        <SELECT name="category" placeholder="Catégorie du produit" >
            <OPTION selected>-- Catégorie --
            <OPTION value="fruit">fruit
            <OPTION value="legume">légume
            <OPTION value="champignon">champignon
            <OPTION value="autre">autres
        </SELECT>
        <input type="text" id="ville" class="text" name="words" placeholder="Ville" />
        <button type="submit" name="valider">Poster</button>        
    </form>
   
                
    <?php include('../controller/RechercheAvanceeModule.php'); ?>
</div>
                
                
                
    <?php include ('footer.php'); ?>