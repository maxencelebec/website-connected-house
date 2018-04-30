<?php
	// Connexion à la base de données
	try
	{
		$bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'appg9d', 'virifocus');
		echo "connecté à la bdd </br>";
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	        echo "non connecté à la bdd";
	}
	$mdp = sha1($_POST['password']);

	echo $mdp;

	$req = $bdd->prepare('INSERT INTO users(mail, password, name, firstname, address, postal_code, city, country, phone_number_home, phone_number_portable, type) VALUES (?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)');
	$req->execute(array($_POST['mail'], $mdp));

	// Redirection du visiteur vers la page suivante
	header('Location: inscription_habitant_2.php');
?>