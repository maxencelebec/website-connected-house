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

<div id="Partie_Droite">

     <img id="image" src="image/virifocus droit.png"/>

     <div class="txtIdentifiant">
         <strong> Identifiant ou Adresse email </strong>
     </div>

     <form>
         <input type="email" size="35" maxlength="25" class="cadreID" style="text-align: center" required>
     </form>

     <div class="txtMdp">
         <strong> Mot de passe </strong>
     </div>
	 
	 <form>
         <input type="password" size="35" maxlength="25" class="cadreMdp" style="text-align: center" required>
     </form>
	 <a class="mdpoublie" href="mdp_oublie.php"> Mot de passe oubli&eacute; ? </a>
     <a class = "lien_co" href="dashboard_simple.php">Se connecter</a>
     </br>
     <a class = "lien_in" href="Inscription_1.php">S'inscrire</a>

</div>

</body>

</html>