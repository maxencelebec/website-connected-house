<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="parametres.css"/>
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
		
		/* Requ�tes des diff�rentes donn�es du compte */
		$req = $bdd->prepare('SELECT * FROM users WHERE mail=?');
		$req->execute(array($_SESSION['mail']));
		
		/* Attribution variable des donn�es */
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
			
				<!-- Boutons des tabs (tableau horizontal) -->
				<div class="tab">
				<button class="tablinks" id="tablink1">Profile</button>		<!-- Le bouton "Profile" est ouvert par d�fault (voir JS) -->
				<button class="tablinks" id="tablink2">Compte</button>
				<button class="tablinks" id="tablink3">Confidentialit&eacute;</button>
				<button class="tablinks" id="tablink4">Notifications</button>
				</div>
				
				<!-- Tab 1 : Profile -->
				<div class="tabcontent" id="profile">
				<form class="profile_form" action="parametres_post.php" method="post"> 
					<!-- (Profile) Bloc 1 -->
					<div class="bloc" id="bloc_profile_1">
						<div id="name">
							<span class="bold"> Nom </span>
							<input type="text"  name="name" value="<?php echo $name;?>">
						</div>
						<div id="firstname">
							<span class="bold"> Prénom </span>
							<input type="text" name="firstname" value="<?php echo $firstname;?>">
						</div>
					</div>
					<!-- (Profile) Bloc 2 -->
					<div class="bloc" id="bloc_profile_2">
						<div id="address">
							<span class="bold"> Adresse de résidence </span>
							<input type="text" name="address" value="<?php echo $address;?>">
						</div>
						<div id="country">
							<span class="bold"> Ville </span>
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
						<div id="fixe">
							<span class="bold"> Numéro fixe </span>
							<input type="text" name="number_home" value="<?php echo $phone_number_home?>">
						</div>
						<div id="phone">
							<span class="bold"> Numéro portable </span>
							<input type="text" name="number_portable" value="<?php echo $phone_number_portable;?>">
						</div>
					</div>
					<input class="enregistrer" type="submit" value="Enregistrer">												
				</form>
				</div>			
				<!-- ---------------------------------------------------- -->
				<!-- Tab 2 : Compte -->
				<div class="tabcontent" id="compte"> Test2 </div>		
				<!-- ---------------------------------------------------- -->		
				<!-- Tab 3 : Confidentialit� -->
				<div class="tabcontent" id="confidentialite"> Test3 </div>		
				<!-- ---------------------------------------------------- -->		
				<!-- Tab 4 : Notifications -->
				<div class="tabcontent" id="notifications"> Test4 </div>
			<?php
				include "footer.php";
			?>
			
			</div>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="parametres.js"></script>
</body>
</html>