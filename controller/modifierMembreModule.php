<?php include('../model/bdd.php'); 

$req = $bdd->prepare('SELECT id, admin, prenom FROM users WHERE id='.$_SESSION["userID"]);

                $req->execute(array(
                    'admin' => $admin,
  						));
                $resultat = $req->fetch();

                $is_admin = $resultat['admin'];
                

		if($is_admin == 0)
                {
                    echo "Vous n'avez pas les droit nécessaires !!!! ";
                    include ('../view/footer.php'); 
                }
        
         elseif($is_admin == 1)
         		{
         			
                    

$user = $bdd->prepare('SELECT prenom, nom, email, age, telephone FROM users WHERE id='.$_GET['idmembre']);
$user -> execute();

$info = $user -> fetch();

if($_POST['modifier']){
header('location : ../view/Admin.php');
}
                }
?>
