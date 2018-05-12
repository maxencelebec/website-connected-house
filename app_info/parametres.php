<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Virifocus </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="parametres.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>

</head>

<body>
	<div id="site">

		<?php 
	    include "header.php"; 
	    ?>

		<?php
            include_once "ajout_piece.php";
            
            $id_habitation = $_SESSION['id_habitation'];

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
        ?>
		
		<div class="main_parametres">
		
			<div class="option_parametres">
			
				<div class="titre_parametres"><h1>G&eacute;rez votre espace</h1></div>
				
				<div class="option1"><a class="lien" href="inscription_habitant_3.php">
	                <img class="option_image" src=""></a></div>
	            <div class="option2"><a class="lien" href="inscription_habitant_5.php?id=<?php echo $_SESSION["id_habitation"]; ?>">
	                <img class="option_image" src="image/message.png"></a></div>
	            <div class="option3"><a class="lien" href="choix_piece.php?id=<?php echo $id_habitation; ?>">
	                <img class="option_image" src="image/SAV.png"></a></div>

	            <div class="option1_text"><a class="help_lien" href="inscription_habitant_3.php">Ajouter une maison</a></div>
	            <div class="option2_text"><a class="help_lien" href="inscription_habitant_5.php?id=<?php echo $_SESSION["id_habitation"]; ?>">Ajouter une pi&egrave;ce</a></div>
	            <div class="option3_text"><a class="help_lien" href="choix_piece.php?id=<?php echo $id_habitation; ?>">Ajouter un capteur</a></div>
			
			</div>
		
		
		
		
		</div>

		<?php 
			include "footer.php" 
		?>
	</div>

</body>