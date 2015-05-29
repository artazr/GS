<?php session_start();  ?>

<DOCTYPE html>
        
<html>
        <head>
                <meta charset="utf-8" />
                <title>GreenSwitch</title>
                <link href="../style.css" rel="stylesheet" />

                <script language="javascript"></script>

                <script src="js/jquery.min.js"></script>
                <script src="js/jquery.dropotron.min.js"></script>
                <script src="js/jquery.scrolly.min.js"></script>
                <script src="js/jquery.onvisible.min.js"></script>
                <script src="js/skel.min.js"></script>
                <script src="js/skel-layers.min.js"></script>
                <script src="js/init.js"></script>
                <script src="js/popupccm.js"></script>
        </head>
        <body>
<header>
            <div>
                <div id="logo">
                    <h1><a href="Accueil.php">GreenSwitch</a></h1>
                    <span>Just Switch it !</span>
                </div>
            </div>
                <nav>
       
                <ul>
                
                         <li><a href="Accueil.php" title="">Accueil</a></li>
                        <li><a href="recherche.php" title="">Rechercher</a></li>
 
<?php
       
        if(!isset($_SESSION["userID"]) && $_SESSION["userID"]==NULL)
                {
                    echo "<li><a href=\"InscriptionConnexion.php\">Inscription/Connexion</a></li>";
                }
 
        elseif (isset($_SESSION["userID"]) && $_SESSION["userID"])
                {
                    echo "<li><a href=\"PosterAnnonce.php\">Poster une annonce</a></li>";
                    echo "<li><a href=\"MonCompte.php\">Mon compte</a></li>";
                    echo "<li><a href=\"deco.php\">Déconnexion</a></li>";
                }

        elseif (isset($_SESSION["userID"]) && isset($_SESSION["adminID"]))
                {
                    echo "<li><a href=\"PosterAnnonce.php\">Poster une annonce</a></li>";
                    echo "<li><a href=\"MonCompte.php\">Mon compte</a></li>";
                    echo "<li><a href=\"Admin.php\">Administration</a></li>";
                    echo "<li><a href=\"deco.php\">Déconnexion</a></li>";
                }
?>
                       
                </ul>
       
       </nav>
        </header>

        
        