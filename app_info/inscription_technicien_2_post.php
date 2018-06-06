<?php
session_start();
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
    $_POST['code']=htmlspecialchars($_POST['code']);
    $req = $bdd->prepare('SELECT code FROM code_technicien');
    $req->execute();
    $ok=0;
    while ($donnees = $req->fetch()){
        if ($donnees['code']==$_POST['code']){
            $ok++;
        }
    }
    if ($ok!=0){
        header('Location: dashboard_technicien.php');
    }
    else{
        header('Location: inscription_technicien_2.php?erreur=1');
    }
?>