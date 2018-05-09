<!DOCTYPE html5>

<?php
$link = mysqli_connect("localhost", "root", ""); // define the login and password
mysqli_select_db($link, "virifocus"); // select the database
?>

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="help_sav.css" />
<script src="help_sav.js"></script>

</head>

<?php include("help_sav_val.php");?>

<body class="help_sav">

	<header> 

<?php include "header.php";?>
</header>

	<div class="imgbox1">
			<img class="bebe" src="image/crying.svg">
			<div class="infobox">
				Ce sont des choses qui arrivent </br> et c'est pourquoi,</br>nous
				sommes là pour vous aider.
			</div>

	</div>
	<div class="containersav">
		
		<form id="ticketsav" method="post" action=<?php $_SERVER['PHP_SELF']?>>


			<label for="maison">Maison</label> <select id="maison" name="maison">
				<option value="">Sélectionner...</option>
				<option value="Casa de Papel">Casa de Papel</option>
				<option value="Maison Blanche">Maison Blanche</option>
				<option value="Trouville en Seine">Trouville en Seine</option>
			</select> 
			
			<label for="device">Type de matériel défectieux</label> <select
				id="device" name="device">
				<option value="">Sélectionner...</option>
				<option value="Patrick">CeMac</option>
				<option value="Bob">Capteur</option>
				<option id="pannegene" value="Patricia">Panne Généralisée</option>
			</select>

			<!-- Ici il faudra voir les capteur dispo et d�fectueux avec la BDD -->
			<label for="capteur">Capteur</label> <select id="capteur"
				name="capteur">
				<option value="">Sélectionner...</option>
          <?php
        $res = mysqli_query($link, "select * from capteur");
        while ($row = mysqli_fetch_array($res)) {
            ?>
            <option><?php echo $row["Capteur 1"];?></option>
            <?php
        }
        
        ?>
        
          
				
			</select> <label for="msg">Message</label>
			<textarea id="msg" name="msg" placeholder="Dites nous tout..."></textarea>

			<input id="submit" type="submit" value="Envoyer">

		</form>
	</div>

	<footer><?php include "footer.php";?></footer>

</body>



