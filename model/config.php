<?php session_start();



	function isadmin()
	{ 
		if (!empty($_SESSION["userID"])) {
		$verifadmin = $bdd -> prepare("SELECT admin FROM users WHERE email =".$_SESSION["userID"]);
                $verifadmin -> execute();
                $numadmin = $verifadmin->fetch();
                if ($numadmin['admin'] == 1) {return TRUE;}
        }else{
        	return false;
        } 
	}
?>