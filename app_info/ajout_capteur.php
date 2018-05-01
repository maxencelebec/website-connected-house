<link rel="stylesheet" href="ajout_capteur.css"/>



<?php
function ajout_capteur($capteur_actionneur)
{
	if ($capteur_actionneur=="luminosité")
	{
		?>
			<div class="capteur">Luminosité</div>
		<?php
	}
	elseif ($capteur_actionneur=="temperature")
	{
		?>
			<div class="capteur">Température</div>
		<?php
	}
	elseif ($capteur_actionneur=="presence")
	{
		?>
			<div class="capteur">Présence</div>
		<?php
	}
	elseif ($capteur_actionneur=="humidité")
	{
		?>
			<div class="capteur">Humidité</div>
		<?php
	}
	elseif ($capteur_actionneur=="porte")
	{
		?>
			<div class="capteur">Porte</div>
		<?php
	}
}
?>