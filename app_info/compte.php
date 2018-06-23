<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="compte.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>
    <?php
    if (!isset($_SESSION['mail'])){
        header('Location: index.php');
    }
    else{
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
        <!--  Contenu du site: PARTIE GAUCHE  -->
        <div class="partie_gauche">
            <div class="bloc" id="user_infos">
                <div class="case" id="head_user_infos">
                    <div class="titre"> Vos Informations</div>
                </div>
                <div class="case" id="ligne1">
                    <div class="text" id="name">
                        <span class="label"> Nom: </span>
                        <?php echo $name; ?>
                    </div>
                    <div class="text" id="firstname">
                        <span class="label"> Prénom: </span>
                        <?php echo $firstname; ?>
                    </div>
                </div>
                <div class="case" id="ligne2">
                    <img id="address-icon" src="image/home.png">
                    <div class="text" id="address">
                        <span class="label"> Addresse de résidence: </span>
                        <?php echo $address; ?>
                    </div>
                </div>
                <div class="case" id="ligne3">
                    <div class="text" id="city">
                        <img id="city-icon" src="image/bank.png">
                        <span class="label"> Ville: </span>
                        <?php echo $city; ?>
                    </div>
                    <div class="text" id="postal_code">
                        <img id="postal-icon" src="image/mailbox.png">
                        <span class="label"> Code Postal: </span>
                        <?php echo $postal_code; ?>
                    </div>
                </div>
                <div class="case" id="ligne4">
                    <div class="text" id="country">
                        <img id="country-icon" src="image/flag.png">
                        <span class="label"> Pays: </span>
                        <?php echo $country; ?>
                    </div>
                </div>
                <div class="case" id="ligne5">
                    <img id="mail-icon" src="image/close-envelope.png">
                    <div class="text" id="mail">
                        <span class="label"> Mail: </span>
                        <?php echo $mail; ?>
                    </div>
                </div>
                <div class="case" id="ligne6">
                    <img id="fixe-icon" src="image/telephone-of-old-design.png">
                    <div class="text" id="phone_number_home">
                        <span class="label"> Numéro fixe: </span>
                        <?php echo "0".$phone_number_home; ?>
                    </div>
                </div>
                <div class="case" id="ligne7">
                    <img id="phone-icon" src="image/smartphone-call.png">
                    <div class="text" id="phone_number_portable">
                        <span class="label"> Numéro Portable:   </span>
                        <?php echo "0".$phone_number_portable; ?>
                    </div>
                    <div class="case" id="ligne_modif">
                        <a class="modif" href="parametres.php"> Modifier Informations </a>
                    </div>
                </div>

            </div>
        </div>

        <!--  Contenu du site: PARTIE DROITE  -->
        <div class="partie_droite">
            <div class="deconnect_space">
                <a class="deconnexion" href="deconnexion_post">
                    <img class="deconnect_button" src="image/power-button-off.png">
                </a>
            </div>
            <div class="bloc" id="ticket"></div>
        </div>

        <?php
        include "footer.php";
        ?>

    </div>
    <?php
    }
    ?>
</body>
</html>