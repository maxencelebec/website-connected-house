<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Virifocus | Home</title>
    <link rel="stylesheet" href="index.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body>

    <div id="partie_gauche">
        
    </div>
    <div id="partie_droite">

        <img id="image" src="image/virifocus droit.png"/>

        <form action="connexion_post.php" method="post">
            <div class="txtIdentifiant"> Identifiant ou Adresse email </div>
            <input type="email" name="mail" size="35" maxlength="25" class="cadreID" style="text-align: center" required>
            <div class="txtMdp">Mot de passe <div>
            <input type="password" name="password" size="35" maxlength="25" class="cadreMdp" style="text-align: center" required>
			<br/>
			<a class="mdpoublie" href="mdp_oublie.php"> Mot de passe oubli&eacute; ? </a>
            <br/>
            <input class="valider" type="submit" value="Se connecter">
        </form>

        </br>
        <br/>
        <a class = "lien_in" href="Inscription_1.php">S'inscrire</a>

    </div>

</body>

</html>