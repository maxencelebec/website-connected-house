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
	$mdp1 = $_POST['password'];
    $mdp2 = $_POST['password_confirm'];
    $mail1 = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail_confirm']);
    echo $mail1.$mail2.$mdp1.$mdp2;

    if ($_SESSION['type'] == 2) {

        $mail_check = 0;
        $req = $bdd->prepare('SELECT mail FROM users');
        $req->execute();
        while ($donnees = $req->fetch()) {
            if ($donnees['mail'] == $mail1) {
                $mail_check = 1;
            }
        }
        if ($mail_check == 1) {
            header("location:inscription_habitant_1.php");
        }
        else if ($mail1 != $mail2) {
            header("location:inscription_habitant_1.php");
        }
        elseif ($mdp1 != $mdp2) {
            header("location:inscription_habitant_1.php");
        }
        else {
            $date = date('Y-m-d H:i:s.u');
            $req = $bdd->prepare('INSERT INTO users(mail, password, name, firstname, address, postal_code, city, country, phone_number_home, phone_number_portable, type, pass_token, date) VALUES (?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,2 ,NULL, ?)');
            $req->execute(array($mail1, $mdp1, $date));

            // Redirection du visiteur vers la page suivante
            header('Location: inscription_habitant_2.php');
        }
    }


    else if ($_SESSION['type'] == 3) {

        $mail_check = 0;
        $req = $bdd->prepare('SELECT mail FROM users');
        $req->execute();
        while ($donnees = $req->fetch()) {
            if ($donnees['mail'] == $mail1) {
                $mail_check = 1;
            }
        }
        if ($mail_check == 1) {
            header("location:inscription_habitant_1.php");
        }
        else if ($mail1 != $mail2) {
            header("location:inscription_habitant_1.php");
        }
        elseif ($mdp1 != $mdp2) {
            header("location:inscription_habitant_1.php");
        }
        else {
            $date = date('Y-m-d H:i:s.u');
            $req = $bdd->prepare('INSERT INTO users(mail, password, name, firstname, address, postal_code, city, country, phone_number_home, phone_number_portable, type, pass_token, date) VALUES (?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,3 ,NULL, ?)');
            $req->execute(array($mail1, $mdp1, $date));

            // Redirection du visiteur vers la page suivante
            header('Location: inscription_technicien_2.php');
        }

    }
?>