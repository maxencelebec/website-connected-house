<?php
	$capt = $_GET['id'];
	try
	{
		$bdd = new PDO('mysql:host=localapp;dbname=test;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	// Insertion du message à l'aide d'une requête préparée
	$bdd->prepare('DELETE FROM capteurs WHERE id= ? ');
	$req->execute(array($capt);

	// Redirection du visiteur vers la page du minichat
	header('Location: minichat.php');
?>
?>