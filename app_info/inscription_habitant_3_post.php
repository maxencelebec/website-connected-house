<?php
    session_start();
    $_SESSION["prenom"]=$_POST['prenom'];
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


	$req = $bdd->prepare('UPDATE users SET name = ?, firstname = ? , address = ? , postal_code = ? , city = ? , country = ? , phone_number_home = ? , phone_number_portable = ? WHERE mail= ? ');
	$req->execute(array($_POST["nom"],$_POST["prenom"],$_POST["adresse"],$_POST["code_postal"],$_POST["ville"],$_POST["pays"],
		$_POST["numero_home"], $_POST["numero_portable"], $_SESSION["mail"]));


	// Redirection du visiteur vers la page suivante
	header('Location: dashboard_simple.php');
?>