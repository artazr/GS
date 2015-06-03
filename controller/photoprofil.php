 <?php 
//on inclut la page qui nous permet de nous connecter à la base de donnée
include('../model/bdd.php');

         $image = $_FILES['profil']['name'];    

                      $req = $bdd->prepare('UPDATE users SET image_nom = \'' . $image . '\'  WHERE id='.$_SESSION["userID"]);
 					$req->execute(); 

                         if(is_uploaded_file($_FILES['profil']['tmp_name']))
                         {
                          if(move_uploaded_file($_FILES['profil']['tmp_name'], $_FILES['profil']['name']))
                          {
                              echo 'actualisez une autre fois pour faire apparaitre l\'image';
                              
                          }
                          else
                          {
                          	echo "";                 
                          }
                      }
                      else
                      {
                      	 echo '';
                      }
