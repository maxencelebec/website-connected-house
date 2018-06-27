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
	$mdp1 = sha1($_POST['password']);
    $mdp2 = sha1($_POST['password_confirm']);
    $mail1 = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail_confirm']);
    $check_mail = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';

    $regex = preg_match($check_mail,$mail1);
    if ($regex==0){
        if ($_SESSION['type'] == 2) {
            header("location:inscription_habitant_1.php");
        }
        else if ($_SESSION['type'] == 3) {
            header("location:inscription_technicien_1.php");
        }
    }
    else {
        
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

    }
?>