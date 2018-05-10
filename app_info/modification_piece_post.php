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

	$req = $bdd->prepare('INSERT INTO capteurs (timestam, id_user, id_habitation, id_piece, id_capteur, type, nom, etat, valeur) VALUES (NULL, ?, ?, ?, ?, ?, ?, NULL, NULL)');
	$req->execute(array($id_user, $_GET['id2'], $_GET['id'], $_POST['IDcapteur'], $_POST['type'], $_POST['nom']));

	echo $_GET['id']. " ".$_GET['id2']. " ".$id_user. " ".$_POST['IDcapteur']." ".$_POST['type']." ".$_POST['nom'];

	// Redirection du visiteur vers la page suivante
	//header('Location: inscription_habitant_5.php');
?>