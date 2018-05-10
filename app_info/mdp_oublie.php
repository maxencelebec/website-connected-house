<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="mdp_oublie.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">

	<!-- Header sans les icones -->
	<div class="header">
		<div class="virifocus"></div>
	</div>
	
	<div class="Main">
		<form class="infos" action="mdp_oublie_post.php" method="post">
			<div class="formulaire">
				<div class="titre"><h1>Réinitialisez votre mot de passe</h1></div>
				<div>Adresse Mail :</div>
				<input type="text" name="mail" style="text-align: center"/>
			</div>		
			<input class="valider" type="submit" value="Valider" name="valider">
		</form>
	</div>
	
	<?php
		include "footer.php";
	?>
	
</body>
</html>