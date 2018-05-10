<?php
	session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="modification_piece.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">

    <div id="site">		
    	
	    <?php
			include "header.php";
		?>
		
		<?php 
			$link = $_GET['id'];
		?>
		
		<div class="tab">  
            <?php

                try
                {
                    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                        die('Erreur : '.$e->getMessage());
                }
                $req = $bdd->prepare('SELECT id FROM users WHERE mail= ? ');
                $req->execute(array($_SESSION["mail"]));

                $id_user;
                while ($donnees = $req->fetch())
                {
                    $id_user=$donnees['id'];
                }

                $req = $bdd->prepare('SELECT id FROM habitation WHERE id_user= ? ');
                $req->execute(array($id_user));

                $id_habitation;
                while ($donnees = $req->fetch())
                {
                    $id_habitation=$donnees['id'];
                }

                $req = $bdd->prepare('SELECT type, nom, id FROM pieces WHERE id_habitation= ? ');
                $req->execute(array($id_habitation));

                while ($donnees = $req->fetch())
                {
                    $piece = $donnees['nom'];
                    $id = $donnees['id'];

                    ?> <a href = "modification_piece.php?id=<?php echo $id; ?>" class = "choix" id= '<?php echo $id; ?>'> <button class="tablinks" id="tablink1"> <?php echo $piece; ?> </button></a>
                    <?php
                }
            ?>
		</div>

		
		<div class="centre">
	        </br>
            <div class= "nom_piece">

                <?php
                $req = $bdd->prepare('SELECT type FROM pieces WHERE id= ? ');
                $req->execute(array($link));

                while ($donnees = $req->fetch())
                {
                    $piece = $donnees['type'];
                }
                ?>

                <?php
                    echo $piece;
                ?>
            </div>

		
            </br>



			  <!-- Bouton modifier, la page inscription piece est à faire (elle est dans les mockups) -->
			<a href="inscription_habitant_5.php" class="boutonModif"> Modifier </a>
            
            <a href="choix_piece.php" class="boutonAjout">Ajouter</a>

            <div class= "taille">
                <?php

                $req = $bdd->prepare('SELECT surface FROM pieces WHERE id= ? ');
                $req->execute(array($link));
                while ($donnees = $req->fetch())
                {
                    $surface = $donnees['surface'];
                }
                ?>

                <?php
                echo "Surface : $surface m2";
                ?>
            </div>
		
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
		
		<table class="table" border="0" width="40%" cellpadding="20">
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

            <img class="image" src="image/<?php echo"$piece"?>.jpg"/>

		</table>

                <span class="ajout"> Ajouter un capteur :&nbsp;&nbsp;&nbsp; </span> </br>

                <form class="nouvcapt">
                    <label for="Type de capteur"> Choisisser votre capteur </label>
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


                                      <!-- Je sais c'est dégueulasse -->

                <form class="nommage">
                    Nommer votre capteur <input type="text" name="nomCapteur" size="25" maxlength="15" style="text-align: center" />
                </form>

                <span> &nbsp;&nbsp;&nbsp;&nbsp; </span>

                <form class="idcapteur">
                    Entrer l'ID du capteur <input type="text" name="IDcapteur" size="25" maxlength="20" style="text-align: center" />
                </form>

        </div>
			
    </div>
	
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="choix_piece.js"></script>

</body>
</html>
