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
    <form method = "post">
        <input type = "text" name= "sujet" placeholder="Entrez le sujet de votre message" /> 
        <br/>
        <textarea name= "message" cols ="20" rows = "30" > Votre message </textarea>
        <br/>
        <input type = "submit" name = "submit_post" value ="Envoyer" />
    </form>
    
    <?php
    
    $date = date("Y-m-d");

    if (isset ($_POST['submit_post'])) {
        $sql =( "INSERT INTO forum VALUES ('".$_POST['sujet']."','".$date."','".$_POST['message']."','".$_GET['a']."','')");
        
        if ($bdd->query($sql) == TRUE) {
            ?><p style="text.align:center;"> Votre message a été envoyé avec succès !</p><?php
        } 
        else {
            echo "Error:".sql."<br>".$bdd->error;
        } 
    }
    ?>
    </body>
    
<footer>
    </footer>

</html>