<link rel="stylesheet" href="ajout_capteur.css"/>



<?php
function ajout_capteur($capteur_actionneur)
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
			<div class="capteur">Température <br/> 23°C </br>
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