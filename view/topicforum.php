<?php

include('../model/bdd.php');

?>

<!DOCTYPE HTML>
<html>
    
    <head>
    </head>
    
    <header>
    </header>
    
    <body>
         <?php
    
            $requete=$bdd->query('SELECT * FROM topic');
    
            foreach($requete as $requete):

        ?>
        <div >
            
            <a href="forum.php?a=<?php echo $requete['id_topic']; ?>"> <?php echo $requete['topic']; ?>
            
        </div>
        
        <?php  endforeach; ?>
        
    </body>
    
    <footer>
    </footer>
        
</html>   