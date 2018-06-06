<?php
    session_start();
    $_SESSION["mail"]=$_POST['mail'];
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

	$mail= $_POST['mail'];
	$mdp = sha1($_POST['password']);

	$counter = 0;

	$req = $bdd->prepare('SELECT password, type FROM users WHERE mail=?');
	$req->execute(array($mail));
	while ($donnees = $req->fetch())
	{
		if ($mdp==$donnees['password']){
			$counter=1;
			if ($donnees['type']==1) {
                header('Location: dashboard_administrateur.php');
            }
            else if ($donnees['type']==2){
                header('Location: dashboard_simple.php');
            }
            else if ($donnees['type']==3){
                header('Location: dashboard_technicien.php');
            }
		}
	}
	if ($counter==0){
		header('Location: index.php?erreur=Probleme de mail ou de mot de passe');
	}

	// Redirection du visiteur vers la page suivante
?>