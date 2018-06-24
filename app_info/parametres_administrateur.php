
<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="parametres_administrateur.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
	<?php
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
		$req = $bdd->prepare('SELECT mail, password FROM users WHERE mail=?');
		$req->execute(array($_SESSION['mail']));

		/* Attribution variable des donn�es */
		 while ($donnees = $req->fetch()) {
		     $name = $donnees['mail'];
		     $password = $donnees['password'];

		}
	?>
</head>
<body class="fond">
            <div id="site">

                <?php
                    include "header.php";
                ?>

                <div class="coeur" >
                    <form class="modif" action="parametres_administrateur_post.php?type=modif" method="post">
                        <div>Modifier vos données personnelles : </div>
                        <div class="deconnect_space">
                            <a class="deconnexion" href="deconnexion_post">
                                <img class="deconnect_button" src="image/power-button-off.png">
                            </a>
                        </div>
                        <div class="modifier">
                            <span> Mail </span>
                            <input type="text" id="mail" name="mail" required>
                            <span > Mot de passe </span>
                            <input type="password" name="password" required> <br>
                            <input class="valider" type="submit" value="valider">
                        </div>
                    </form>

                    <form class="ajout" action="parametres_administrateur_post.php?type=ajout" method="post">
                        <div>Ajouter un nouvel administrateur : </div>
                        <div class="ajouter">
                            <span> Mail </span>
                            <input type="text" id="mail" name="mail" required>
                            <span > Mot de passe </span>
                            <input type="password" name="password" required><br>
                            <input class="valider" type="submit" value="valider">
                        </div>
                    </form>
                </div>

                <?php
                    include "footer.php";
                ?>

			</div>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</body>
</html?>