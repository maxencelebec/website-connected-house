<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
	<title> Virifocus | Modification piece</title>
	<link rel="stylesheet" href="modification_piece.css"/>
    <link rel"icon" type="image/png" href="image/logo.png" />
</head>



<body class="corps">

	<?php
		include "header.php";
    ?>
     
	<div class="centre">
	
        <div class= "nom_piece">  
		<?php
		    $selected_room = "Cuisine";
		    echo "$selected_room";
		?>
		</div>
		
		</br>
		
		<div class= "taille">
		<?php
		    $superficie= 15;
			echo 'Superfie de la pièce : ' . $superficie . ' m²';
		?>
		</div>
		
		<img class="image" src="image/cuisine.jpg"/>
		
		<!-- ça c'est juste des tests pour moi -->
	    <div> numéro identifiant / nom / type capteur</div>
	    <?php
		    $mot = "coucou";
		    echo 'bonsoir et ' . $mot . ' re';
		?>
	    <div> re coucou </div>
		
    </div>


</body>