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

    <form class="infos" action="inscription_habitant_1_post.php" method="post">

        <div class="formulaire">

            <div class="titre"><h1>Entrez vos informations</h1></div>

            <div>Adresse email :</div>
            <input type="text" name="mail" maxlenght="255" style="text-align: center"/>
            <div>Confirmez votre addresse email :</div>
            <input type="text" name="mail_confirm" maxlenght="255" style="text-align: center"/>
            <div>Mot de passe :</div>
            <input type="password" name="password" minlenght="6" maxlenght="255" style="text-align: center"/>
            <div>Confirmez votre mot de passe :</div>
            <input type="password" name="password_confirm" minlenght="6" maxlenght="255" style="text-align: center"/>

        </div>

        <div class="captcha">

            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
            <br/>
            <input class="valider" type="submit" value="Valider">

            <a class="lien" href="inscription_habitant_2.html"><p>Next Page Debug</p></a>

        </div>

    </form>



</div>

</body>

</html>