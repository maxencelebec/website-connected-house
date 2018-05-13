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
 
    if (isset($_POST['valider'])) {     /* Après envoie */            
          
        if($_POST['mdp']===$_POST['mdp_confirm']) {
            $nouv_mdp = sha1($_POST['mdp']);
            echo $nouv_mdp;
            $req = $bdd->prepare('UPDATE users SET password=? FROM users WHERE mail=? AND pass_token=?');
            $req->execute(array($nouv_mdp,$mail,$token));
        }
        else {
            ?>
            
            <p class="text_erreur">
            	Veuillez vérifier les données saisies
            </p>
            
            <?php 
        }
    }
}
else {
    echo "sortie 2";
    /*  header("Location: index.php"); /* Retour à l'index car l'URL est erronné */
    /*  exit(); */
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

		<form class="infos" action="change_mdp.php?mail=<?php echo $_GET['mail']; ?>&pass_token=<?php echo $_GET['pass_token']; ?>" method="POST">

			<div class="formulaire">
				<div class="titre"><h1>Changez votre mot de passe</h1></div>
				<div>Mot de passe :</div>
				<input type="password" name="mdp" style="text-align: center"/>
				<div>Confirmez votre mot de passe :</div>
				<input type="password" name="mdp_confirm" style="text-align: center"/>
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