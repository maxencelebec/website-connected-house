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

$req = $bdd->prepare('SELECT id FROM habitation WHERE id_user= ? ');
$req->execute(array($id_user));

$id_habitation;
while ($donnees = $req->fetch())
{
    $id_user=$donnees['id'];
}

$req = $bdd->prepare('INSERT INTO pieces (nom, surface, id_user, id_habitation) VALUES (?, ?, ?, ?)');
$req->execute(array($_POST["nom"],$_POST["surface"],$id_habitation));

// Redirection du visiteur vers la page suivante
header('Location: inscription_habitant_5.php');
?>