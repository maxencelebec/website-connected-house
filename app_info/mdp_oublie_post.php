<?php
	try
	{
		$bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
		echo "ERREUR BDD ERREUR BDD ERREUR BDD";
	}
		
	/* Requêtes des différentes données du compte */
	$req = $bdd->prepare('SELECT * FROM users WHERE mail=$_POST["mail"]');
		
	/* Attribution variable des données */
	while ($donnees = $req->fetch()) {
		$name = $donnees['name'];
	}
	
	if ($name!=null){
		echo "ça marche !";
	}
	else {
		echo "ça n'a pas marché";
	}
?>