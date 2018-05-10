<?php
	session_start();
?>

<!DOCTYPE html>

<html>

<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="choix_piece.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">

    <div id="site">		
    	
	    <?php
			include "header.php";
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
                                $_SESSION["id_piece_choix"]=$id;


                                ?> <a href = "modification_piece.php?id=<?php echo $id; ?>" class = "choix" id= '<?php echo $id; ?>'> <button class="tablinks" id="tablink1"> <?php echo $piece; ?> </button></a>
                                <?php
                            }
                        ?>

		</div>
        <div>salut</div>
		<?php
			include "footer.php";
		?>
			
    </div>
	
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="choix_piece.js"></script>

</body>
</html>
