<!DOCTYPE HTML>
<html>
    <?php

include('../model/bdd.php');

?>

 <?php
    
    $requete=$bdd->query('SELECT * FROM forum WHERE topic="'.$_GET['a'].'"');
    
    foreach($requete as $requete):

?>

    <head>
    </head>
    
    <header>
    </header>
    
    <body>
        
        <div >
            
            <h1> <?php echo $requete['sujet']; ?>    
            </h1>
            
            <h2> <?php echo $requete['text']; ?>
            </h2>    
            
        </div>
        
        <?php  endforeach; ?>
        
        <a href="postforum.php?a=<?php echo $_GET['a']; ?>"> lien </a>
        
    </body>
    
    <footer>
    </footer>
    
</html>   