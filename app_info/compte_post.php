<?php
    session_start();
?>
<?php
	// Connexion à la base de données
	try
	{
		$bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
		echo "connecté à la bdd </br>";
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	        echo "non connecté à la bdd";
	}
    
	if (isset($_POST['nmdp'])) { /* Si l'utilisateur souhaite changer son mdp et a entré des valeurs dans le champ */	    
	    
	    if (isset($_POST['cmdp'])) {   /* Vérification que l'utilisateur a bien rempli les 2 champs pour mdp */
	        
	        $nmdp = $_POST['nmdp'];
	        $cmdp = $_POST['cmdp'];
	        
	        if ($nmdp==$cmdp) {    /* Vérification que les deux champs sont identiques */
	            $mdp = sha1($nmdp);
	            $req = $bdd->prepare('UPDATE users SET password=? WHERE mail=?');
	            $req->execute(array($mdp, $_SESSION['mail']));
	        }
	        else {
	            echo "Mot de passe erronné.";
	        }
	    }
	    else {
	        echo "Veuillez confirmer votre mot de passe.";
	    }
	}
	
	

	$req = $bdd->prepare('UPDATE users SET name = ?, firstname = ? , postal_code = ?  , country = ?  , phone_number_portable = ? , mail = ?  WHERE mail= ? ');
	$req->execute(array($_POST["name"],$_POST["firstname"],$_POST["postal_code"],$_POST["country"],
		 $_POST["phone_number"], $_POST["mail"], $_SESSION["mail"]));


	// Redirection du visiteur vers la page suivante
	header('Location: compte.php');
?>