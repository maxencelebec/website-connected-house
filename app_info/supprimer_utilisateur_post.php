<?php
try {
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('DELETE FROM users WHERE id=?');
$req->execute(array($_GET['id']));
header('Location: dashboard_administrateur.php');
?>