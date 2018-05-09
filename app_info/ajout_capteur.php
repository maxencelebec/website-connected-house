<link rel="stylesheet" href="ajout_capteur.css"/>



<?php
function ajout_capteur($capteur_actionneur,$id)
{
	if ($capteur_actionneur=="luminosité")
	{
		?>
			<div class="capteur">Luminosité <br/> 220 Lux </br>
				<?php
                    include 'boutton.php';
                ?>
			</div>
		<?php
	}
	elseif ($capteur_actionneur=="temperature")
	{
		?>


        <?php

        try
        {
            $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

        $req = $bdd->prepare('SELECT valeur FROM capteurs WHERE id_piece= ? ');
        $req->execute(array($id));

        while ($donnees = $req->fetch())
        {
            $valeur = $donnees['valeur'];
        }
        ?>


			<div class="capteur">Température <br/> <?php echo $valeur ?> </br>
				<?php
                    include 'boutton.php';
                ?>
			</div>
		<?php
	}
	elseif ($capteur_actionneur=="presence")
	{
		?>
			<div class="capteur">Présence <br/> OUI </br>
				<?php
                    include 'boutton.php';
                ?>
			</div>
		<?php
	}
	elseif ($capteur_actionneur=="humidité")
	{
		?>
			<div class="capteur">Humidité <br/> 24% </br> 
				<?php
                    include 'boutton.php';
                ?>
			</div>
		<?php
	}
	elseif ($capteur_actionneur=="porte")
	{
		?>
			<div class="capteur">Porte <br/>
				<?php
                    include 'boutton.php';
                ?>
			</br>
			Ouvert/fermé
			</div>
		<?php
	}
}
?>