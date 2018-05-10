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

	$req = $bdd->prepare('INSERT INTO habitation (pays, ville, code_postal, adresse, surface, id_user, nom, type) VALUES (?, ?, ?, ?, ?, ?, ?, NULL)');
	$req->execute(array($_POST["pays"],$_POST["ville"],$_POST["code_postal"],$_POST["adresse"],$_POST["surface"],$id_user, $_POST["nom"]));

    $req = $bdd->prepare('SELECT id FROM habitation WHERE nom=?');
    $req->execute(array($_POST["nom"]));
    while ($donnees = $req->fetch())
    {
        $id_habitation = $donnees['id'];

    }

	// Redirection du visiteur vers la page suivante
	header("Location: inscription_habitant_5.php?id=$id_habitation");
?>