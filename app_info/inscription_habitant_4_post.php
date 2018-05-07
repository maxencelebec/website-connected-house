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

	$req = $bdd->prepare('SELECT id FROM users WHERE mail= ? ');
	$req->execute(array($_SESSION["mail"]));

	$id_user;
	while ($donnees = $req->fetch())
	{
		$id_user=$donnees['id'];
	}


/*INSERT INTO habitation (pays, ville, code_postal, adresse, surface, id_user, type) VALUES (?, ?, ?, ?, ?, ?, NULL)'*/

	$req = $bdd->prepare('INSERT INTO habitation (pays, ville, code_postal, adresse, surface, id_user, type) VALUES (?, ?, ?, ?, ?, ?, NULL)');
	$req->execute(array($_POST["pays"],$_POST["ville"],$_POST["code_postal"],$_POST["adresse"],$_POST["surface"],$id_user));

	// Redirection du visiteur vers la page suivante
	header('Location: inscription_habitant_5.php');
?>