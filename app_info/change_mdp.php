<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="change_mdp.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">
	<div class="header">
		<div class="virifocus"></div>
	</div>
	
	<div class="Main">

		<form class="infos" action="?" method="POST">

			<div class="formulaire">
				<div class="titre"><h1>Changez votre mot de passe</h1></div>
				<div>Mot de passe :</div>
				<input type="password" id="mdp" style="text-align: center"/>
				<div>Confirmez votre mot de passe :</div>
				<input type="password" id="mdp_confirm" style="text-align: center"/>
			</div>

			<input class="valider" type="submit" value="Valider">

			</div>
		</form>
	</div>
	
	<?php
		include "footer.php";
	?>
	
</body>
</html>