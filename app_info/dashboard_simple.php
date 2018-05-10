<?php
    try
    {
        $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Virifocus </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="dashboard_simple.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>

</head>
<body class="fond">

            <div id="site">

                <?php
                    include "header.php";
                ?>

                <div class="main">

                    <?php

                    $req = $bdd->prepare('SELECT id FROM users WHERE mail=?');
                    $req->execute(array($_SESSION["mail"]));
                    while ($donnees = $req->fetch())
                    {
                        $id_user = $donnees['id'];
                    }

                    $req = $bdd->prepare('SELECT nom FROM habitation WHERE id_user=?');
                    $req->execute(array($id_user));
                    while ($donnees = $req->fetch())
                    {
                        $nom_maison = $donnees['nom'];
                        include_once "creation_dashboard_simple.php";
                        creation_dashboard_simple($nom_maison);
                    }
                    ?>
                    <br>
                    <?php
                        include "dashboard_simple_ajouter.php";
                    ?>
                    
                </div>

                <?php
                    include "footer.php";
                ?>

            </div>

</body>
<script src="dashboard_simple.js"></script>
</html>
