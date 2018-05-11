<!DOCTYPE html>
<?php
    /* Vérification de l'URL */
    if (ISSET($_GET['mail']) && ISSET($_GET['pass_token'])) {
        /* Connection BDD*/
        try
        {
            $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        
        $mail = $_GET['mail'];
        $token = $_GET['pass_token'];
        
        /* Requêtes des différentes données du compte */
        $req = $bdd->prepare('SELECT COUNT(password) FROM users WHERE mail=? AND pass_token=?');
        $req->execute(array($mail,$token));
        
        while ($donnees = $req->fetch()) {
            $compteur = $donnees['COUNT(password)'];
        }
        
        if ($compteur>0) { /* Combinaison mail/pass_token correct */
            
            if (isset($_POST['valider']) && ($_POST['mdp']==$_POST['mdp_confirm'])) {   /* Lors de l'envoi et nouveaux mdps similaires */
                
                $req = $bdd->prepare('UPDATE users SET password=? WHERE mail=? AND pass_token=?');
                $req->execute(array($mdp, $mail, $token));
                
                echo $mdp;
            }
            
            else if (isset($_POST['valider']) && ($_POST['mdp']!=$_POST['mdp_confirm'])) { /* Lors de l'envoi et nouveaux mdps différents */
                echo "mdp différents...";
            }            
        }
        
        else {
            header("Location: index.php"); /* Retour à l'index car combinaison mail/pass_token incorrect */
            exit();
        }
    }
    
    else {
        header("Location: index.php"); /* Retour à l'index car l'URL est erronné */
        exit();
    }	
	?>
	
<html>
<head>
    <title>Virifocus</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="change_mdp.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">
	<div class="header">
		<div class="virifocus"></div>
	</div>
	
	<div class="Main">

		<form class="infos" action="change_mdp.php" method="POST">

			<div class="formulaire">
				<div class="titre"><h1>Changez votre mot de passe</h1></div>
				<div>Mot de passe :</div>
				<input type="password" id="mdp" style="text-align: center"/>
				<div>Confirmez votre mot de passe :</div>
				<input type="password" id="mdp_confirm" style="text-align: center"/>
			</div>

			<input class="valider" type="submit" value="Valider" name="valider">

			</div>
		</form>
	</div>
	
	<?php
		include "footer.php";
	?>
	
</body>
</html>