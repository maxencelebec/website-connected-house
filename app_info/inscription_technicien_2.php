<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Virifocus | Inscription</title>
    <link rel="stylesheet" href="inscription_habitant_1.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body class="fond">

<div id="menu">

    <div class="case1">
        <div class="case11"></div>
        <div class="case12">
            <div class="case1212"><br><br>Home</div></a></div>
        <div class="case13">
            <div class="case1313"><br><br>Compte</div></a></div>
        <div class="case14">
            <div class="case1414"><br><br>Paramètres</div></a></div>
        <div class="case15">
            <div class="case1515"><br><br>Aide</div></a></div>
        <div class="case16"></div>
    </div>

</div>


<div class="Main">

    <form class="infos" action="inscription_technicien_2_post.php" method="POST">

        <div class="formulaire">

            <div class="titre"><h2>Entrez votre code de technicien agréé par Domisep :</h2></div>

            <label>Votre code :</label>
            <input type="text" name="code" style="text-align: center"/>
            <input class="valider" type="submit" value="Valider">
            <?php if (isset($_GET['erreur'])){
                echo "Ce code ne correspond pas à un code agréé par Domisep";
            }?>

        </div>



    </form>



</div>

</body>

</html>