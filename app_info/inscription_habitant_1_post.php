<?php
    session_start();
    $_SESSION["mail"]=$_POST['mail'];
?>

<?php

	// Connexion à la base de données
	try
	{
		$bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
	$mdp = sha1($_POST['password']);

    $date = date('Y-m-d H:i:s.u');
    if ($_SESSION['type']==2) {
        $req = $bdd->prepare('INSERT INTO users(mail, password, name, firstname, address, postal_code, city, country, phone_number_home, phone_number_portable, type, pass_token, date) VALUES (?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, ?)');
        $req->execute(array($_POST['mail'], $mdp, $date));

        // Redirection du visiteur vers la page suivante
        header('Location: inscription_habitant_2.php');
    }
    else if ($_SESSION['type']==3){
        $req = $bdd->prepare('INSERT INTO users(mail, password, name, firstname, address, postal_code, city, country, phone_number_home, phone_number_portable, type, pass_token, date) VALUES (?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, ?)');
        $req->execute(array($_POST['mail'], $mdp, $date));
        // Redirection du visiteur vers la page suivante
        //header('Location: inscription_technicien_2.php');
    }
?>