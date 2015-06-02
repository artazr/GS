<?php
    include("header.php");
?>

	<div >
	 
            <div class="title">
                <h2>Informations</h2>
                <span>Gerer les membres</span> 
            </div>
            <div id="AdminModule">
                    <?php include ('../controller/modifierMembreModule.php'); ?>

                <form name="insertion" action="../controller/modifierMembreModuleEnvoi.php" method="POST">
				   <input type="hidden" name="id" value="<?php echo $_GET['idmembre'];?>">
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
            </div>
        </div>
	</div>


<?php
    include("footer.php");
?>