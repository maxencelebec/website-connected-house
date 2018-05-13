<!DOCTYPE html>
<?php
    /* Connection à la BDD*/
	try
	{
		$bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	
	/* Après le submit */
	if (ISSET($_POST['valider'])) {
	    
	    $mail = $_POST['mail'];
	    
    	/* Requêtes des différentes données du compte */	
    	$req = $bdd->prepare('SELECT COUNT(id) FROM users WHERE mail=?');
    	$req->execute(array($mail));
    		
    	/* Attribution variable des données */
    	while ($donnees = $req->fetch()) {
    		$compteur = $donnees['COUNT(id)'];
    	}
    	
    	/* Vérification du mail dans la BDD */
    	if ($compteur>0) {
    	    /* Génération d'un jeton pour éviter les abus */
    		$token = str_shuffle("0123456789azertyuiopqsdfghjklmwxcvbn");
    		$token = substr($token,0,10);
    		
    		$req = $bdd->prepare('UPDATE users SET pass_token=? WHERE mail=?');
    		$req-> execute(array($token, $mail));
    		
    		header("Location: change_mdp.php?mail=$mail&pass_token=$token");
    		/* Ecriture du mail et envoie */
    		/*
    		$url = "http://localapp/app_info/change_mdp.php?mail='$mail'&pass_token='$token'";
    		$sujet = "Virifocus | Réinitialisation du mot de passe";
    		$message = "Une demande de réinitialisation de votre mot de passe a été faite.
                        \n Afin de poursuivre la procédure, veuillez cliquer sur ce lien:
                        \n '$url'"
            mail("vincent.nguyen96@ymail.com", $sujet, $message, "From: vincent.nguyen96@ymail.com\r\n");
    		*/
    		?>
    		<p class='text_envoi'>
       		Un mail vous permettant de réinitialiser votre mot de passe vous a été envoyé.
    		Vous le trouverez dans votre boîte de réception d'ici quelques minutes.
    		Pensez à vérifier vos Courriers Indésirables si vous ne trouvez pas le mail.
    		 </p>
    		 <?php
    	}
    	else { ?>   	
    		<p class='text_erreur'>
    		Nous n'avons pas reconnu votre mail. Veuillez vérifier vos identifiants.
    		</p>
    		<?php
    	}
	}
?>

<html>
<head>
    <title>Virifocus</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="mdp_oublie.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">

	<!-- Header sans les icones -->
	<div class="header">
		<div class="virifocus"></div>
	</div>
	
	<div class="Main">
		<form class="infos" action="mdp_oublie.php" method="post">
			<div class="formulaire">
				<div class="titre"><h1>Réinitialisez votre mot de passe</h1></div>
				<div>Adresse Mail :</div>
				<input type="text" name="mail" style="text-align: center"/>
			</div>		
			<input class="valider" type="submit" value="Valider" name="valider">
		</form>
	</div>
	
	<?php
		include "footer.php";
	?>
	
</body>
</html>