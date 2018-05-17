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
	<script language="JavaScript" src="index.js"></script>
</head>

<body onLoad="preload('image/Cuisine.jpg','image/Cave.jpg','image/Chambre.jpg')">

    <div class="partie_gauche">
            <img src="image/Cuisine.jpg" id="Puzzle" name="Puzzle" width="700vw" height="400vh"><br>
            <a href="javascript:chgSlide(-1)" class="prev ">   <button class="boutton">< </button>   </a>
            <a href="javascript:chgSlide(1)" class="next">   <button class="boutton"> > </button>  </a>
    </div>

    <div id="Partie_Droite">

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