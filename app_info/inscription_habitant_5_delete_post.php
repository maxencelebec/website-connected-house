<?php
	session_start();
	$piece = $_GET['id'];
	$id_habitation = $_SESSION["id_habitation"];
	try
	{
		$bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	// Insertion du message à l'aide d'une requête préparée
	$req = $bdd->prepare('DELETE FROM pieces WHERE id = ?');
	$req->execute(array($piece));

	// Redirection du visiteur vers la page du minichat
	header("Location: inscription_habitant_5_post.php?id=$id_habitation");
?>