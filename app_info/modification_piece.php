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
        <?php
            $id_habitation = $_GET['id2'];
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

                $req = $bdd->prepare('SELECT type, nom, id FROM pieces WHERE id_habitation= ? ');
                $req->execute(array($_SESSION["id_habitation"]));

                while ($donnees = $req->fetch())
                {
                    $piece = $donnees['nom'];
                    $id = $donnees['id'];

                    ?> <a href = "modification_piece.php?id=<?php echo $id; ?>&id2=<?php echo $_SESSION["id_habitation"]; ?>" class = "choix" id= '<?php echo $id; ?>'> <button class="tablinks" id="tablink1"> <?php echo $piece; ?> </button></a>
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
			<a href="inscription_habitant_5.php?id=<?php echo $id_habitation; ?>" class="boutonModif"> Modifier </a>
            

            <div class= "taille">
                <?php

                    $req = $bdd->prepare('SELECT surface FROM pieces WHERE id= ? ');
                    $req->execute(array($link));
                    while ($donnees = $req->fetch())
                    {
                        $surface = $donnees['surface'];
                    }
                    echo "Surface : $surface m2";
                ?>
                </br>
                <?php

                    $req = $bdd->prepare('SELECT * FROM capteurs WHERE id_piece = ? ');
                    $req->execute(array($_GET['id']));

                    $counter=0;  
                    while ($donnees = $req->fetch())
                    {
                        $counter++;
                    }

                    echo 'Nombre de capteurs : ' . $counter;
                ?>

                </br>
                <?php
                    $nbCapteursActifs=2;
                    echo ' Capteurs actifs : ' ;
                ?>
            </div>
		
		<div class="infoCapteurs">
            <div class="liste">Liste des capteurs : </div>
            <?php

            $req = $bdd->prepare('SELECT type, nom, id FROM capteurs WHERE id_piece= ? ');
            $req->execute(array($_GET['id']));
            while ($donnees = $req->fetch())
            {
                $capt = $donnees['id'];
                ?> <a class = "suppr" href="modification_piece_delete_post.php?id2=<?php echo $capt; ?>&id=<?php echo $link; ?>>x </a> <?php
                echo "- ".$donnees['nom']." (type : ".$donnees['type'].")"."<br/>";
            }
            ?>
		</div>    
		
		<table class="table" border="0" width="40%" cellpadding="20">
		    

		</table>
        <img class="image" src="image/<?php echo"$piece"?>.jpg"/>

                <form action ="modification_piece_post.php?id=<?php echo $link;?>&id2=<?php echo $id_habitation; ?>" method="post" class="nommage">
                    <br/>
                    <div> Choisisser votre capteur
                    <select name="type">
                        <option value="temperature"> Température </option>
                        <option value="luminosite"> Luminosité </option>
                        <option value="presence"> Présence </option>
                        <option value="porte"> Porte </option>
                        <option value="humidite"> Humidité </option>
                        <option value="fenetre"> Fenêtre </option>
                        <option value="sonore"> Sonore </option>
                    </select></div>
                    <br/>
                    <div>Nommer votre capteur
                    <input type="text" name="nom" size="25" maxlength="15" style="text-align: center" /></div>
                    <br/>
                    <div>Entrer l'ID du capteur
                    <input class="idcapteur" type="text" name="IDcapteur" size="25" maxlength="20" style="text-align: center" /></div> 
                    <br/>
                    <input type="submit" class="boutonAjout" name="valider" value="Ajouter"/>
                </form>

        </div>
			
    </div>
    <?php
        include "footer.php";
    ?>
	
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="choix_piece.js"></script>

</body>
</html>
