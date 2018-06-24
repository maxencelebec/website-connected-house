<?php
session_start();

// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

if ($_GET['type']=="modif"){
    $mail=htmlspecialchars($_POST['mail']);
    $mdp=sha1($_POST['password']);
    $req = $bdd->prepare('UPDATE users SET mail=?, password=? WHERE mail=?');
    $req->execute(array($mail, $mdp, $_SESSION['mail']));
    $_SESSION['mail']=$mail;
}
else{
    $mail=htmlspecialchars($_POST['mail']);
    $mdp=sha1($_POST['password']);
    $date = date('Y-m-d H:i:s.u');
    $req = $bdd->prepare('INSERT INTO users(mail, password, name, firstname, address, postal_code, city, country, phone_number_home, phone_number_portable, type, pass_token, date) VALUES (?, ?, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL,1 ,NULL, ?)');
    $req->execute(array($mail, $mdp, $date));
}



header('Location: dashboard_administrateur.php');

?>