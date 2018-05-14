<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="compte.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
				echo "ERREUR BDD ERREUR BDD ERREUR BDD";
		}
		
		/* Requêtes des différentes données du compte */
		$req = $bdd->prepare('SELECT * FROM users WHERE mail=?');
		$req->execute(array($_SESSION['mail']));
		
		/* Attribution variable des données */
		 while ($donnees = $req->fetch()) {
			$name = $donnees['name'];
			$firstname = $donnees['firstname'];
			$address = $donnees['address'];
            $city = $donnees['city'];
			$postal_code = $donnees['postal_code'];
			$country = $donnees['country'];
			$mail = $donnees['mail'];
			$phone_number_home = $donnees['phone_number_home'];
			$phone_number_portable = $donnees['phone_number_portable'];
			
		}
	?>
</head>
<body class="fond">
	<div id="site">
			
	<?php
        include "header.php";
    ?>
		<!--  Contenu du site: PARTIE GAUCHE  -->
		<div class="partie_gauche">
			<div class="bloc" id="user_infos">
				<div class="case" id="head">
					<div class="titre"> Profile </div>
				</div>
				<div class="case" id="ligne1">
    				<div class="text" id="name"> Nom: <?php echo $name;?> </div>
    				<div class="text" id="firstname"> Pr&eacute;nom: <?php echo $firstname;?> </div>
    			</div>
    			<div class="case" id="ligne2">
					<div class="text" id="address"> Addresse de r&eacute;sidence: <?php echo $address;?> </div>
				</div>
				<div class="case" id="ligne3">
					<div class="text" id="city"> Ville: <?php echo $city;?> </div>
					<div class="text" id="postal_code"> Code Postale: <?php echo $postal_code;?> </div>
					<div class="text" id="country"> Pays: <?php echo $country;?> </div>
				</div>
				<div class="case" id="ligne4">
					<div class="text" id="mail"> Mail: <?php echo $mail;?> </div>
				</div>
				<div class="case" id="ligne5">
					<div class="text" id="phone_number_home"> Num&eacute;ro fixe: <?php echo $phone_number_home;?></div>
				</div>
				<div class="case" id="ligne6">
					<div class="text" id="phone_number_portable"> Num&eacute;ro portable: <?php echo $phone_number_portable;?></div>				
				</div>
			</div>
		</div>
		
		<!--  Contenu du site: PARTIE DROITE  -->
		<div class="partie_droite">
			<div class="bloc" id="ticket"></div>
		</div>
				
	<?php
		include "footer.php";
    ?>
			
	</div>
</body>
</html>