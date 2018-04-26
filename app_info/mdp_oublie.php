<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="mdp_oublie.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">
	<div class="header">
		<div class="virifocus"></div>
	</div>
	
	<div class="Main">

		<form class="infos" action="?" method="POST">

			<div class="formulaire">
				<div class="titre"><h1>Réinitialisez votre mot de passe</h1></div>
				<div>Adresse Mail :</div>
				<input type="text" id="mail" style="text-align: center"/>
			</div>
			
			<input class="valider" type="submit" value="Valider">
			<a class="lien"  href="change_mdp.php"> Debug </a>

		</form>
	</div>
	
	<?php
		include "footer.php";
	?>
	
</body>
</html>