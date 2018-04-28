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
		include "footer.php";
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
			
			<span class="boutonModif">                                           <!-- Bouton modifier, la page inscription piece est à faire (elle est dans les mockups) -->
			    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <a href="inscription_piece"> Modifier </a>
			</span>

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
		
	    <div>
		    <span class="ajout"> Ajouter un capteur :&nbsp;&nbsp;&nbsp; </span>
			
			<form>
			    <label for="Type de capteur"> Choisisser le type de votre capteur </label>
				<select name="Type de capteur">
				    <option value="feu"> Feu </option>
					<option value="eau"> Eau </option>
					<option value="plante"> Plante </option>
					<option value="sol"> Sol </option>
					<option value="elec"> Electrique </option>
					<option value="normal"> Normal </option>
					<option value="combat"> Combat </option>
					<option value="glace"> Glace </option>
					<option value="roche"> Roche </option>
					<option value="psy"> Psy </option>
					<option value="spectre"> Spectre </option>
					<option value="tenebre"> Ténèbre </option>
					<option value="poison"> Poison </option>
					<option value="insecte"> Insecte </option>
					<option value="vol"> Vol </option>
					<option value="acier"> Acier </option>
					<option value="dragon"> Dragon </option>
					<option value="fee"> Fée </option>
			    </select>
			</form>
			
			<span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>                        <!-- Je sais c'est dégueulasse -->
			
			<form>
			    Nommer votre capteur <input type="text" name="nomCapteur" size="25" maxlength="15" style="text-align: center" /> 
			</form>
			
			<span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
			
			<form>
			    Entrer l'ID du capteur <input type="text" name="IDcapteur" size="25" maxlength="20" style="text-align: center" />
			</form>
			
		</div>
		
    </div>

</body>