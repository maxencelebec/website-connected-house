<!DOCTYPE html>

<html>

<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="choix_piece.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">

    <div id="site">		
    	
	    <?php
			include "header.php";
		?>
		
		
		<div class="tab">                                              	    <!-- Boutons des tabs (tableau gauche) -->
			<button class="tablinks" id="tablink1">Cuisine</button>
			<button class="tablinks" id="tablink2">Salon</button>
			<button class="tablinks" id="tablink3">Salle de bain</button>
			<button class="tablinks" id="tablink4">Cave</button>
			<button class="tablinks" id="tablink5">Chambre</button>
		</div>

		
		<div id="Cuisine" class="tabcontent">
			<?php
				$selected_room = "Cuisine";
				include "modification_piece.php";
			?>
		</div>			

		<div id="Salon" class="tabcontent">
			<?php
				$selected_room = "Salon";
				include "modification_piece.php";
			?>						
		</div>		
		
		<div id="Salle de bain" class="tabcontent">
			<?php
				$selected_room = "Salle de bain";
				include "modification_piece.php";
			?>
		</div>		

		<div id="Cave" class="tabcontent">
			<?php
				$selected_room = "Cave";
				include "modification_piece.php";
			?>
		</div>
	
		<div id="Chambre" class="tabcontent">
			<?php
				$selected_room = "Chambre";
				include "modification_piece.php";
			?>
		</div>
			
		<?php
			include "footer.php";
		?>
			
    </div>
	
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="choix_piece.js"></script>

</body>
</html>
