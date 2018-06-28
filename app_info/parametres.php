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
				<button class="tablinks" id="tablink1">Profil</button>		<!-- Le bouton "Profile" est ouvert par d�fault (voir JS) -->
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
							<span class="tag" id="tag_name"> Nom </span>
							<input type="text" id="name" name="name" value="<?php echo $name;?>">
						</div>
						<div id="firstname">
							<span class="tag"> Prénom </span>
							<input type="text" name="firstname" value="<?php echo $firstname;?>">
						</div>
					</div>
					<!-- (Profile) Bloc 2 -->
					<div class="bloc" id="bloc_profile_2">
						<div class="row" id="bloc_profile_2_row_1">
    						<div id="address">
    							<span class="tag"> Adresse de résidence </span>
    							<input type="text" name="address" value="<?php echo $address;?>">
    						</div>
    					</div>
						<div class="row" id="bloc_profile_2_row_2">
    						<div id="country">
    							<span class="tag"> Ville </span>
    							<input type="text" name="country" value="<?php echo $country;?>">
    						</div>
    						<div id="city">
    							<span class="tag"> Code Postal </span>							
    							<input type="text" name="postal_code" value="<?php echo $postal_code;?>">
    						</div>
    					</div>
					</div>
					<!-- (Profile) Bloc 3 -->
					<div class="bloc" id="bloc_profile_3">
						<div id="mail">
							<span class="tag"> Adresse Mail </span>
							<input type="text" name="mail" value="<?php echo $mail;?>">
						</div>
						<div id="fixe">
							<span class="tag"> Numéro fixe </span>
							<input type="text" name="number_home" value="<?php echo $phone_number_home?>">
						</div>
						<div id="phone">
							<span class="tag"> Numéro portable </span>
							<input type="text" name="phone_number" value="<?php echo $phone_number_portable;?>">
						</div>
					</div>
					<input class="enregistrer" type="submit" value="Enregistrer">												
				</form>
				</div>			
				<!-- ---------------------------------------------------- -->
				<!-- Tab 2 : Compte -->
				<div class="tabcontent" id="compte"> En construction </div>
				<!-- ---------------------------------------------------- -->		
				<!-- Tab 3 : Confidentialit� -->
				<div class="tabcontent" id="confidentialite"> En construction </div>
				<!-- ---------------------------------------------------- -->		
				<!-- Tab 4 : Notifications -->
				<div class="tabcontent" id="notifications"> En construction </div>
			<?php
				include "footer.php";
			?>
			
			</div>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="parametres.js"></script>
</body>
</html>