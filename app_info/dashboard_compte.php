<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="dashboard_compte.css"/>
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
			$mail = $donnees['mail'];
			$phone_number_portable = $donnees['phone_number_portable'];
			$country = $donnees['country'];
			$postal_code = $donnees['postal_code'];
		}
	?>
</head>
<body class="fond">
            <div id="site">
			
			<?php
				include "header.php";
			?>
			
				<!-- Boutons des tabs (tableau horizontal) -->
				<div class="tab">
				<button class="tablinks" id="tablink1">Profile</button>		<!-- Le bouton "Profile" est ouvert par défault (voir JS) -->
				<button class="tablinks" id="tablink2">Compte</button>
				<button class="tablinks" id="tablink3">Confidentialit&eacute;</button>
				<button class="tablinks" id="tablink4">Notifications</button>
				<a class ="deco" href="index.php"><button class="deco_boutton">D&eacuteconnexion</button></a>
				</div>
				
				<!-- Tab 1 : Profile -->
				<div id="profile" class="tabcontent">
				<form class="profile_form" action="" method="post"> 
					<!-- (Profile) Bloc 1 -->
					<div class="bloc" id="bloc_profile_1">
						<div id="name">
							<span class="bold"> Name </span>
							<input type="text" name="name" value="<?php echo $name;?>">
						</div>
						<div id="firstname">
							<span class="bold"> Firstname </span>
							<input type="text" name="firstname" value="<?php echo $firstname;?>">
						</div>
						<div id="birthday">
						<span class="bold"> Birthday </span> <?php?>
						</div>
					</div>
					<!-- (Profile) Bloc 2 -->
					<div class="bloc" id="bloc_profile_2">
						<div id="country">
							<span class="bold"> Country </span>
							<input type="text" name="country" value="<?php echo $country;?>">
						</div>
						<div id="city">
							<span class="bold"> Code Postal </span>							
							<input type="text" name="postal_code" value="<?php echo $postal_code;?>">
						</div>
					</div>
					<!-- (Profile) Bloc 3 -->
					<div class="bloc" id="bloc_profile_3">
						<div id="mail">
							<span class="bold"> Adresse Mail </span>
							<input type="text" name="mail" value="<?php echo $mail;?>">
						</div>
						<div id="phone">
							<span class="bold"> Phone number </span>
							<input type="text" name="phone_number" value="<?php echo $phone_number_portable;?>">
						</div>
					</div>
					<input class="enregistrer" type="submit" value="Enregistrer">												
				</form>
				</div>			
						
					<!-- Tab 2 : Compte -->
						<div id="compte" class="tabcontent"> Test2 </div>		
						
					<!-- Tab 3 : Confidentialité -->
						<div id="confidentialite" class="tabcontent"> Test3 </div>		
						
					<!-- Tab 4 : Notifications -->
						<div id="notifications" class="tabcontent"> Test4 </div>
			<?php
				include "footer.php";
			?>
			
			</div>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="dashboard_compte.js"></script>
</body>
</html>