<?php include ('header.php');
include('../model/bdd.php'); 

$req = $bdd->prepare('SELECT id, admin, prenom FROM users WHERE id='.$_SESSION["userID"]);

                $req->execute(array(
                    'admin' => $admin,
                        ));
                $resultat = $req->fetch();

                $is_admin = $resultat['admin'];
                

        if(isset($_SESSION["userID"])==NULL)
                {
                    echo "Vous n'avez pas les droit nécessaires !!!! ";
                    include ('../view/footer.php'); 
                }
        
         else
                {
                    ?>
                    <menu>
<?php include ('../view/menu.php'); ?>
</menu>
    <div id="info">
        <div >
            <div class="title">
                <h2> Rechercher une Annonce</h2>
                <span>Soyez informez par mail dès qu'une annonce postée comportera l'intitulé de votre recherche</span> 
            </div>
            <div >
                    
                           <form method="post" action="rechercheAnnonce.php">

                             <input type="text" class="text" name="recherche_annonce" placeholder="Vous êtes intéressez par" />

                             <button type="submit" name="envoi" >Envoyer</button>
                

                </form>
             
<?php
include('../model/bdd.php');
 if (isset($_POST['envoi']))  
    {
              $recherche_annonce     = htmlspecialchars($_POST["recherche_annonce"]);
        // Remplissage de la base de donnée          
        $req = $bdd->prepare('INSERT INTO recherche_annonce(email, recherche_annonce) VALUES(:email, :recherche_annonce)');
                $req->execute(array(
            'email' => $_SESSION['userMail'],
            'recherche_annonce' => $recherche_annonce
            )); 
    }
    else{
        echo'';
    }
    
?>
                   
     </div>
        </div>
    </div>

    <br />
    <br />
  
        <?php include ('footer.php'); 
                }

        
   ?>

