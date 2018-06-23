<?php
session_start();
/* Connection à la BDD */
try {
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Virifocus</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="dashboard_maison.css" />
<link rel="icon" type="image/png" href="image/logo.png" />
<script src="jQuery.js"></script>
<script src="dashboard_maison.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</head>
<body class="fond">
	<div id="site">
                
        <?php
        include "header.php";
        ?>

        <?php
        if (isset($_GET['id'])) {
            $_SESSION['id_habitation'] = $_GET['id'];
        }
        $id_habitation = $_SESSION['id_habitation'];
        ?>
		
          <div class="main1">
			<div class="photo_nom">
				<div class="photomaison">

                    <?php
                    $id_hab = $_SESSION['id_habitation'];
                    $req = $bdd->prepare("SELECT image FROM habitation WHERE id= '$id_hab'");
                    $req->execute();
                    while ($donnees = $req->fetch()) {
                        $path = $donnees['image'];
                    }
                    ?>


                    <style>
                        .photomaison {
                            background-image:url("<?php echo $path; ?>");
                            background-size: cover;
                            background-position: center;
                            grid-row: 1/11;
                            grid-column: 1/3;
                        }
                    </style>
                    
                </div>
				<div class="nommaison">
                    <?php
                    
                    $req = $bdd->prepare('SELECT nom FROM habitation WHERE id=?');
                    $req->execute(array($id_habitation));
                    while ($donnees = $req->fetch()) {
                        echo $donnees["nom"];
                    }

                    ?>

                </div>

                <div class="changephoto">
                    <button class="gears" onclick="selectimage()"></button>
                    <div id="selectphoto">
                        <button id="close" data-ido="56" onclick="fermerselectimage()">x</button>
                        <form action="image_post.php" method="post" enctype="multipart/form-data">
                            <input class="file" type="file" name="fileToUpload" id="fileToUpload">
                            <input class="upload" type="submit" value="Upload Image" name="submit">
                        </form>
                    </div>
                </div>

            </div>



			<div class="cadre_info_fixe">
				<div class="home_mode_titre">Home Mode</div>
				<div class="home_mode">
					<div id="eco_mode" onclick="mode_eco()">Eco</div>
					<div id="moyen_mode" onclick="mode_moyen()">Moyen</div>
					<div id="max_mode" onclick="mode_max()">Max</div>
				</div>
				<div class="securite_titre">Sécurité</div>
				<div class="securite">
					<div class="boutton_onoff">
                                <?php
                                $boutton = 2;
                                include "boutton.php";
                                ?>
                                <br>ON/OFF
					</div>
				</div>
				<div class="utilisateur_titre">Utilisateur connecté</div>
				<div class="utilisateur">
                            <?php
                            
                            $req = $bdd->prepare('SELECT name,firstname FROM users WHERE mail=?');
                            $req->execute(array(
                                $_SESSION["mail"]
                            ));
                            while ($donnees = $req->fetch()) {
                                echo "<p style='color: #2cc872'>" . $donnees["firstname"] . " " . $donnees["name"] . "</p>";
                            }
                            ?>
                        </div>
			</div>
		</div>




		<div class="main2">
			<div class="informations">
				<div class="informations_valeur">
					<div id="eau" onclick="eau()">
						<div class="case31111">Luminosité</div>
						<div class="case31112"></div>
					</div>
					<div id="temperature" onclick="temperature()">
						<div class="case31121">Température</div>
						<div class="case31122"></div>
					</div>
					<div id="consommation" onclick="consommation()">
						<div class="case31131">Utilisation</div>
						<div class="case31132">

                            <?php
                            /*
                            $req = $bdd->prepare('SELECT valeur FROM capteurs WHERE id=?');
                            $req->execute(array($_GET['id']));
                            while ($donnees = $req->fetch()) {
                                echo $donnees["valeur"];
                            }
                            */
                            ?>

                        </div>
					</div>
				</div>
				<div class="informations_graphe">
					<div id="triangle1"></div>
				</div>
				<div class="fond_triangle">

                    <?php

                    require ('./views/graphics_ctlr/graphdashboard.php');

                    ?>

                </div>
			</div>
			<div class="control_pieces">

                        <?php
                        
                        include_once "ajout_piece.php";
                        
                       
                        $req = $bdd->prepare('SELECT id FROM users WHERE mail= ? ');
                        $req->execute(array(
                            $_SESSION["mail"]
                        ));
                        
                        $id_user;
                        while ($donnees = $req->fetch()) {
                            $id_user = $donnees['id'];
                        }
                        
                        $req = $bdd->prepare('SELECT type, id FROM pieces WHERE id_habitation= ? ');
                        $req->execute(array(
                            $id_habitation
                        ));
                        
                        while ($donnees = $req->fetch()) {
                            $piece = $donnees['type'];
                            $id = $donnees['id'];
                            ajout_piece("$piece", "$id");
                        }
                        
                        ?>
                        
                <div class="boutton1">
                    <a href="inscription_habitant_5.php?id=<?php echo $_SESSION["id_habitation"]; ?>"
						class="ajouterpiece"> + ajouter pièce </a>
                    <a href="choix_piece.php?id=<?php echo $id_habitation; ?>"
						class="ajouterpiece"> modifier pièce </a>
				</div>



			</div>
		</div>


                <?php
                include "footer.php";
                ?>

        </div>

	<div id="fenetre">
		<button id="close" data-ido="56" onclick="fermer()">x</button>
		fenetre pop-up
	</div>
</body>
<script src="dashboard_maison.js"></script>



</html>

