<!DOCTYPE html5>

<?php
$link = mysqli_connect("localhost", "root", ""); // define the login and password
mysqli_select_db($link, "virifocus"); // select the database
mysqli_set_charset($link,"utf8");
?>

<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="help_sav.css" />
<script src="help_sav.js"></script>

</head>



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

		<form id="ticketsav" action="help_sav_post" method="post">


			<label for="maison">Maison</label> <select id="maison" name="maison">
				<option value="">Sélectionner...</option>
				
				 <?php
        $res = mysqli_query($link, "select * from habitation");
        while ($row = mysqli_fetch_array($res)) {
            
           
            ?>
            <option><?php echo $row["nom"];?></option>
            
            <?php
        }
        
        ?>
			</select> <label for="device">Type de matériel défectieux</label> <select
				id="device" name="device">
				<option value="">Sélectionner...</option>
				<option value="cemac">CeMac</option>
				<option value="capteur">Capteur</option>
				<option id="pannegene" value="pannegene">Panne Généralisée</option>
				
                
                
                
			</select>
			
			<!-- Ici il faudra voir les capteur dispo et défectueux avec la BDD -->
			<label for="capteur">Capteur</label> <select id="capteur"
				name="capteur">
				<option value="">Sélectionner...</option>
          <?php
        $res = mysqli_query($link, "select * from capteurs");
        while ($row = mysqli_fetch_array($res)) {
            ?>
            <option><?php echo $row["nom"];?></option>
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



