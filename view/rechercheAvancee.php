<?php include ('header.php'); ?>



 <div id="recherche">
       
            <div class="title">
                <h2>Recherche Avancée</h2>
                <span>Effectuez ici vos recherches par filtres</span> 
            </div>
                
 <form method="GET" action="rechercheAvancee.php">
        <input type="text" class="text" name="words" placeholder="Titre de l'annonce" />
        <SELECT name="category" placeholder="Catégorie du produit" >
            <OPTION value="category">Catégorie
            <OPTION value="fruit">fruit
            <OPTION value="legume">légume
            <OPTION value="champignon">champignon
            <OPTION value="autre">autres
        </SELECT>
       
           <input type="text" name="villes" list="listeVille" placeholder="Ville" id="liste_ville"/>
        <button type="submit" id="valider">Poster</button>        
    </form>
   
            
    <?php include('../controller/RechercheAvanceeModule.php'); ?>
    
    <?php
/*
        $sqlVille = "SELECT * FROM villes";
        $req = $bdd->prepare($sqlVille);

        try
        {
            $req->execute();                
            $nb = $$req->rowCount();
            $res = $req->fetch();
        }
        catch (PDOException $e) 
        {
            echo $e->getMessage();
        }
    */
    ?>
                
  <!--  <datalist id="listeVille">
            <?php 
                $i = 0;
                while ($i < $nb){
                    echo '<option value='.$res['ville'].'>';
                    $res = $stmt->fetch();
                    $i++;
                }
            ?>  
    </datalist>
-->
                
</div>
                
<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
                
    <?php include ('footer.php'); ?>