<link rel="stylesheet" href="ajout_capteur.css" />



<?php

function ajout_capteur($capteur_actionneur, $id, $id_capteur)
{
    ?>
<div class="capteur">

        <?php
    if ($capteur_actionneur == "luminosite") {
        echo "Luminosité";
    } elseif ($capteur_actionneur == "temperature") {
        echo "Température";
    } elseif ($capteur_actionneur == "presence") {
        echo "Présence";
    } elseif ($capteur_actionneur == "humidite") {
        echo "Humidité";
    } elseif ($capteur_actionneur == "porte") {
        echo "Porte";
    }
    ?>

        <br />
	<div class="result">
        <?php
    
    $connect = new PDO("mysql:host=localapp;dbname=virifocus", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $req = $connect->prepare("SELECT etat, valeur, id_capteur FROM capteurs WHERE id=? ");
    $req->execute(array(
        $id_capteur
    ));
    while ($donnees = $req->fetch()) {
        $etat = $donnees['etat'];

        $req = $connect->prepare('SELECT num_capteur, valeur FROM trame_courante WHERE num_capteur=?
                          ORDER BY timestamp DESC LIMIT 1');
        $req->execute(array($donnees['id_capteur']));
        
        while($recup = $req->fetch()) {
            $valeur = $recup['valeur'];
            $num_capteur = $recup['num_capteur'];
        
        if ($etat == 1 && $capteur_actionneur == "temperature" && $num_capteur == $donnees['id_capteur']) {
            $update = $connect->prepare("UPDATE capteurs set valeur=$valeur WHERE id=?");
            $update->execute(array(
                $id_capteur
            ));
            echo $valeur . "°C";
        }
        if ($etat == 1 && $capteur_actionneur == "luminosite") {
            echo "220lux";
        }
        if ($etat == 1 && $capteur_actionneur == "porte") {
            echo "open";
        } elseif ($etat == 0 && $capteur_actionneur == "porte") {
            echo "close";
        }
        if ($etat == 1 && $capteur_actionneur == "presence") {
            echo "on";
        } elseif ($etat == 0 && $capteur_actionneur == "presence") {
            echo "off";
        }
        if ($etat == 1 && $capteur_actionneur == "humidite") {
            echo "30%";
        }
        if ($etat == 0) {
            echo "";
        }
    }
}

?>
        </div>

        <?php
        $boutton = 1;
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
                    data:{id_capteur:id_capt},
                    /*
                    success:function(data){
                        $('.result').html(data);
                    }
                    */


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