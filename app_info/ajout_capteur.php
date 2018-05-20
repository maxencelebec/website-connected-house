<link rel="stylesheet" href="ajout_capteur.css"/>



<?php
function ajout_capteur($capteur_actionneur,$id,$id_capteur)
{
    ?>
    <div class="capteur">

        <?php
            if ($capteur_actionneur=="luminosite"){
                echo "Luminosité";
            }
            elseif ($capteur_actionneur=="temperature"){
                echo "Température";
            }
            elseif ($capteur_actionneur=="presence"){
                echo "Présence";
            }
            elseif ($capteur_actionneur=="humidite"){
                echo "Humidité";
            }
            elseif ($capteur_actionneur=="porte"){
                echo "Porte";
            }
        ?>

        <br/> <div id="result"></div> </br>

        <?php
            echo $id_capteur;
            include ('boutton.php');

        ?>
    </div>
    <script>
        $(document).ready(function(){
            $('input[type="checkbox"][value="<?php echo $id_capteur; ?>"]').click(function(){
                var id_capt = <?= $id_capteur;?>;
                $.ajax({
                    url:"check.php",
                    method:"POST",
                    data:{id_capteur:id_capt}

                });
            });
        });
    </script>

    <?php

    }
?>




<?php /*

	if ($capteur_actionneur=="luminosite")
	{
		?>
			<div class="capteur">Luminosité <br/> 220 Lux </br>
				<?php
                echo $id_capteur;
                    include ('boutton.php');
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
                echo $id_capteur;
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
                echo $id_capteur;
                    include 'boutton.php';
                ?>
			</div>
		<?php
	}
	elseif ($capteur_actionneur=="humidite")
	{
		?>
			<div class="capteur">Humidité <br/> 24% </br>
				<?php
                    echo $id_capteur;
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
                    echo $id_capteur;
                    include 'boutton.php';
                ?>
			</br>
			Ouvert/fermé
			</div>
		<?php
	}

}
 */
?>