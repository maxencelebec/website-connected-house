<?php
    session_start();
    $_SESSION["firstname"]=$_POST['firstname'];
    $_SESSION["name"]=$_POST['name'];
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


	$req = $bdd->prepare('UPDATE users SET name = ?, firstname = ? , postal_code = ? , city = ? , country = ?  , phone_number_portable = ? , mail = ? , WHERE mail= ? ');
	$req->execute(array($_POST["name"],$_POST["firstname"],$_POST["postal_code"],$_POST["city"],$_POST["country"],
		 $_POST["phone_number"], $_POST["mail"], $_SESSION["mail"]));


	// Redirection du visiteur vers la page suivante
	header('Location: dashboard_compte.php');
?>