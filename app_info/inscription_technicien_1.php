<?php
    session_start();
    $_SESSION['type']=3;
?>

<!DOCTYPE html>
<html>
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

    <form class="infos" action="inscription_1_post.php" method="POST">

        <div class="formulaire">

            <div class="titre"><h1>Entrez vos informations</h1></div>

            <label>Adresse email :</label>
            <input type="email" name="mail" maxlenght="255" style="text-align: center" required/>
            <label>Confirmez votre addresse email :</label>
            <input type="email" name="mail_confirm" maxlenght="255" style="text-align: center" required/>
            <label>Mot de passe :</label>
            <input type="password" name="password" minlenght="6" maxlenght="255" style="text-align: center" required/>
            <label>Confirmez votre mot de passe :</label>
            <input type="password" name="password_confirm" minlenght="6" maxlenght="255" style="text-align: center" required/>

        </div>

        <div class="captcha">

            <div><input type="checkbox" id="check" onclick="control(this.id)"> J'accepte les termes et conditions générales d'utilisation</div>
            <div id="erreur" style="color: red"></div>
            <input class="valider" type="submit" value="Valider" id="envoie">


        </div>

    </form>



</div>

</body>
<script src="inscription_1.js"></script>

</html>