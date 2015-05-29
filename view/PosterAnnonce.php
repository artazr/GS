<?php include ('header.php'); ?>
   
   <menu>
    <?php include ('menu.php'); ?>
</menu>
    <div id="formulaire">
            <div class="title">
                <h2>Formulaire de mise en ligne d'annonces:</h2>
                <span>Mettez en ligne votre produit !</span> 
            </div>
            <div >
                <form method="post" action="../controller/PosterAnnonceModule.php">
                    
                        
                            <input type="text" class="text" name="title" placeholder="Titre de l'annonce" />
                        
                       
                            <input type="text" class="text" name="name" placeholder="Nom du produit" />
                       
                       
                            <SELECT name="category" placeholder="Catégorie du produit" >
                            <OPTION selected>-- Catégorie --
                            <OPTION>fruit
                            <OPTION>légumes
                            <OPTION>champignons
                            <OPTION>autres
                            </SELECT>
                         
                      
                            <input type="text" class="text" name="location" placeholder="Région" />
                       
                       
                            <input type="text" class="text" name="city" placeholder="Ville" />
                      
                        
                            <textarea type="text" class="text" name="description" placeholder="   Description"></textarea>
                            
                           <input type="file" name="fichier" size="30">
                           
							<br />
							<br />
                        
                   
                    <button type="submit" name="upload" value="Uploader">Poster</button>
                    <!-- Appel de la page php d'inscritpion -->
                        <?php include('../controller/PosterAnnonceModule.php'); ?>
                </form>
            </div>
       
    
</div>
      <?php include ('footer.php'); ?>

