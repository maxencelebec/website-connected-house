<?php
session_start();

/* Récupération des données sur le site fourni */
$url = 'projets-tomcat:8080/appService';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'TEAM=009D&ACTION=GETLOG');
$data = curl_exec($ch);
$file_size = curl_getinfo($ch, CURLINFO_SIZE_DOWNLOAD);
echo $file_size;
curl_close($ch);

/* Stockage des trames dans un array */
$data_tab = preg_split("/([0-9]009D)/", $data, - 1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

/* Connection à la BDD */
try {
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

/* ####### ECRITURE DES TRAMES DANS LA BDD ######## */
for ($i = 0, $size_demi = round(count($data_tab) / 2); $i < $size_demi; $i ++) {
    
    /* Récupération de la trame dans data_tab */
    $j = 2 * $i;
    $k = 2 * $i + 1;
    $trame = "$data_tab[$j]$data_tab[$k]";
    
    /* Récupération du type de la trame */
    $type_trame = substr($trame, 0, 1);
    
    /* Gestion des trames selon leur type, vérifie notamment la cohérence avec la longueur de la trame */
    
    /* Trame courante (33) */
    if (($type_trame == 1) && (strlen($trame) == 33)) {
        $num_objet = substr($trame, 1, 4);
        $type_req = substr($trame, 5, 1);
        $type_capteur = substr($trame, 6, 1);
        $num_capteur = substr($trame, 7, 2);
        $valeur = substr($trame, 9, 4);
        $tim = substr($trame, 13, 4);
        $checksum = substr($trame, 17, 2);
        $timestamp = substr($trame, 19);
        
        /* Envoie dans la BDD */
        $req = $bdd->prepare('INSERT INTO trame_courante(type_trame, num_objet, type_req, type_capteur, num_capteur, valeur, tim, checksum, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array(
            $type_trame,
            $num_objet,
            $type_req,
            $type_capteur,
            $num_capteur,
            $valeur,
            $tim,
            $checksum,
            $timestamp
        ));
    }    
    /* Trame rapide (25) */
    elseif (($type_trame == 3) && (strlen($trame) == 25)) {
        $num_objet = substr($trame, 1, 4);
        $type_req = substr($trame, 5, 1);
        $type_capteur = substr($trame, 6, 1);
        $nbr = substr($trame, 7, 1);
        $donnees = substr($trame, 8, 1);
        $checksum = substr($trame, 9, 2);
        $timestamp = substr($trame, 11);
        
        /* Envoie dans la BDD */
        $req = $bdd->prepare('INSERT INTO trame_rapide(type_trame, num_objet, type_req, type_capteur, nbr, donnees, checksum, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $req->execute(array(
            $type_trame,
            $num_objet,
            $type_req,
            $type_capteur,
            $nbr,
            $donnees,
            $checksum,
            $timestamp
        ));
    }
}
/* Emondé un peu la BDD: Suppresion des valeurs vieilles de 5min */
date_default_timezone_set('Europe/Paris');
$time = date("YmdHis");
$time = $time - 500;
$req = $bdd->prepare('DELETE FROM trame_courante WHERE timestamp<?');
$req->execute(array($time));
?>

<!DOCTYPE html>
<html>
<head>
<title>Virifocus</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="dashboard_maison.css" />
<link rel="icon" type="image/png" href="image/logo.png" />
<script src="jQuery.js"></script>
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</head>
<body class="fond">
	<div id="site">
                
        <?php
        include "header.php";
        ?>

        <?php
        $_SESSION['id_habitation'] = $_GET['id'];
        $id_habitation = $_SESSION['id_habitation'];
        ?>

          <div class="main1">
			<div class="photo_nom">
				<div class="photomaison"></div>
				<div class="nommaison">
                    <?php
                    
                    $req = $bdd->prepare('SELECT nom FROM habitation WHERE id=?');
                    $req->execute(array(
                        $_GET['id']
                    ));
                    while ($donnees = $req->fetch()) {
                        echo $donnees["nom"];
                    }
                    ?>

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
						<div class="case31112">1000L</div>
					</div>
					<div id="temperature" onclick="temperature()">
						<div class="case31121">Température</div>
						<div class="case31122">23°C</div>
					</div>
					<div id="consommation" onclick="consommation()">
						<div class="case31131">Utilisation</div>
						<div class="case31132">65%</div>
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
                        
                        try {
                            $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }
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
					<a
						href="inscription_habitant_5.php?id=<?php echo $_SESSION["id_habitation"]; ?>"
						class="ajouterpiece"> + ajouter pièce </a> <a
						href="choix_piece.php?id=<?php echo $id_habitation; ?>"
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

