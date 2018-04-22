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
	    </br>
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
			    echo 'Superficie : ' . $superficie . ' m²';
		    ?>
		</div>
		
		<img class="image" src="image/cuisine.jpg"/>
		
		</br>
		
		<div class="infoCapteurs">
		    <?php
		        $nbCapteurs=3;
			    $nbCapteursActifs=2;
			    echo 'Nombre de capteurs : ' . $nbCapteurs;
		    ?>
		    </br>
		    <?php
       		    echo ' Capteurs actifs : ' . $nbCapteursActifs;
		    ?>
		</div>
		
		</br>
		
		<table border="0" width="40%" cellpadding="20">
		    <?php
			    for($nbLignes = 1 ; $nbLignes <= $nbCapteurs ; $nbLignes++) {				
			?>	
			        <tr>                                       <!-- Le remplissage c'est du fake (c'est pour ça que c'est dégueulasse connard) -->
					    <td>                                       <!-- Colonne1 DEBUT -->
						    <?php
							    if ($nbLignes=1) {
							?>
							        <div> Chauffage </div> </br>
							<?php
							    }
							?>
							<?php
							    if ($nbLignes=2) {
							?>
							        <div> Lumière </div> </br>
							<?php
							    }
							?>
							<?php
							    if ($nbLignes=3) {
							?>
							        <div> Volets </div> </br>
							<?php
							    }
							?>                                    <!-- Colonne1 FIN -->
						</td>
						
						<td>                                      <!-- Colonne2 DEBUT -->
						    <?php
							    if ($nbLignes=1) {
							?>
							        <div class="ON"> ON </div> </br>
							<?php
							    }
							?>
							<?php
							    if ($nbLignes=2) {
							?>
							        <div class="ON"> ON </div> </br>
							<?php
							    }
							?>
							<?php
							    if ($nbLignes=3) {
							?>
							        <div class="OFF"> OFF </div> </br>
							<?php
							    }
							?>												
						</td>                                     <!-- Colonne2 FIN -->
					</tr>
			<?php
			    }
			?>		    
		</table>
		
		</br>
		
		
		<!-- ça c'est juste des tests pour moi -->
	    <div> numéro identifiant / nom / type capteur</div>
	    <?php
		    $mot = "coucou";
		    echo 'bonsoir et ' . $mot . ' re';
		?>
	    <div> re coucou </div>
		
    </div>


</body>