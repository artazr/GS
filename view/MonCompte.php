<?php include ('header.php'); ?>

 <menu>
    <?php include ('menu.php'); ?>
</menu>
	<div id="info">
	 	<div id="AdminModule">
            <div class="title">
                <h2>Mes informations</h2>
                <span>Complétez vos informations pour un profil complet !</span> 
            </div>
            <div >
                    <?php include ('../controller/MonCompteModule.php'); ?>
                <form name="insertion" action="../view/MonCompteModif.php" method="POST" enctype='multipart/form-data'>
				   
                   <table border="0" align="center" cellspacing="2" cellpadding="2">
                   	<tr align="center">
                   		<td>Nom</td>
                   		<td><input type="text" name="nom" value="<?php echo($info['nom']) ;?>"></td>
                   	</tr>
                   	<tr align="center">
                   		<td>Prenom</td>
                   		<td><input type="text" name="prenom" value="<?php echo($info['prenom']) ;?>"></td>
                   	</tr>
                   	<tr align="center">
                   		<td>E-mail</td>
                   		<td><input type="text" name="email" value="<?php echo($info['email']) ;?>"></td>
                   	</tr>
                   	<tr align="center">
                   		<td>Age</td>
                   		<td><input type="text" name="age" value="<?php echo($info['age']) ;?>"></td>
                   	</tr>
                   	<tr align="center">
                   		<td>Télephone</td>
                   		<td><input type="text" name="telephone" value="<?php echo($info['telephone']) ;?>"></td>
                   	</tr>

  <tr align="center">
                      <td colspan="2"><input type="submit" value="modifier"></td>
                    </tr>
                   </table>
                </form>
                <br />
                
 <?php $reponse = $bdd->query('SELECT image_nom FROM users WHERE id='.$_SESSION["userID"]);
 $donnees = $reponse->fetch();
 echo '<div id="photo">';
echo 'Image de profil';
 echo "<img src='../controller/".$donnees['image_nom']."'/>";
 echo '</div>';
                ?>
                
                      
                  
                    <form method="post" action='../view/monCompte.php'  enctype='multipart/form-data'>
                    
                      Changer de photo de profil (max 1Mo)
                      
                       <input type="file" name="profil" /><br />
                    
                     <button type="submit" name="upload" value="Uploader">Poster</button>
                      <?php include ('../controller/photoprofil.php'); ?>
                   </form>
            </div>
        </div>
	</div>

    <br />

    
        <?php include ('footer.php'); ?>
    