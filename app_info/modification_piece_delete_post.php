<?php
	session_start();
	$capt = $_GET['id2'];
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
	$req = $bdd->prepare('DELETE FROM capteurs WHERE id = ?');
	$req->execute(array($capt));

	// Redirection du visiteur vers la page du minichat
	header("Location: modification_piece(abd).php?id=$piece&id2=$id_habitation");
?>