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

    <form class="infos" action="inscription_habitant_4_post" method="post">

        <div class="formulaire">

            <div class="titre"><h1>Informations de la maison</h1></div>

            <div>Nom de la maison :</div>
            <input type="text" name="nom" maxlenght="255" style="text-align: center" />
            <div>Adresse :</div>
            <input type="text" name="adresse" maxlenght="255" style="text-align: center" />
            <div>Code postal :</div>
            <input type="text" name="code_postal" maxlenght="255" style="text-align: center" />
            <div>Ville :</div>
            <input type="text" name="ville" maxlenght="255" style="text-align: center" />
            <div>Pays :</div>
            <input type="text" name="pays" maxlenght="255" style="text-align: center" />
            <div>Surface totale :</div>
            <input type="text" name="surface" maxlenght="255" style="text-align: center"  />

        </div>

        <div class="captcha">

            <br/>
            <input class="valider" type="submit" value="Valider">


        </div>

    </form>



</div>

</body>

</html>