<?php
	session_start();

	try
	{
	    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

	$req = $bdd->prepare('SELECT id FROM users WHERE mail= ? ');
	$req->execute(array($_SESSION["mail"]));

	$id_user;		
	while ($donnees = $req->fetch())
	{
	    $id_user=$donnees['id'];
	}
	$timestamp = null;
	$etat = 0;
	$valeur = 0;
	$req = $bdd->prepare('INSERT INTO capteurs (timestamp, id_user, id_habitation, id_piece, id_capteur, type, nom, etat, valeur) VALUES (NULL, ?, ?, ?, ?, ?, ?, NULL, NULL)');
	$req->execute(array($timestamp ,$id_user, $_SESSION['id_habitation'], $_GET['id'], $_POST['IDcapteur'], $_POST['type'], $_POST['nom'], $etat, $valeur));

	$temp = $_GET['id'];
	$dac = $_SESSION['id_habitation'];
	// Redirection du visiteur vers la page suivante
	header("Location: modification_piece.php?id=$temp&id2=$dac");
?>