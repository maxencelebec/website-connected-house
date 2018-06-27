<link rel="stylesheet" href="ajout_capteur.css" />



<?php
function ajout_capteur($capteur_actionneur, $id, $id_capteur)
{
    ?>
<div class="capteur">
	<div class="result">
        <?php
    
    $connect = new PDO("mysql:host=localapp;dbname=virifocus", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $req = $connect->prepare("SELECT etat, nom, valeur, id_capteur FROM capteurs WHERE id=? ");
    $req->execute(array(
        $id_capteur
    ));
    while ($donnees = $req->fetch()) {
        $etat = $donnees['etat'];
        $nom=$donnees['nom'];
        if ($capteur_actionneur=="led"){echo "- ".$nom." -";};
        $req = $connect->prepare('SELECT id_capteur, valeur FROM logs WHERE id_capteur=?
                          ORDER BY timestamp DESC LIMIT 1');
        $req->execute(array($donnees['id_capteur']));
        while ($recup = $req->fetch()) {
            $valeur = $recup['valeur'];
            
            $id_capteur_logs = $recup['id_capteur'];

            if ($capteur_actionneur == "temperature" && $id_capteur_logs == $donnees['id_capteur']) {
                $update = $connect->prepare("UPDATE capteurs set valeur=? WHERE id=?");
                $update->execute(array($valeur,
                    $id_capteur
                ));
                
                echo "- ".$nom." -<br>";
                if ($etat == 1){
                    echo hexdec($valeur) . "°C";
                }
            }

            if ($capteur_actionneur == "luminosite" && $id_capteur_logs == $donnees['id_capteur']) {
                $update = $connect->prepare("UPDATE capteurs set valeur=? WHERE id=?");
                $update->execute(array($valeur,
                    $id_capteur
                ));

                echo "- ".$nom." -<br>";
                if ($etat == 1){
                    echo $valeur . " lux";
                }
            }

            if ($capteur_actionneur == "presence" && $id_capteur_logs == $donnees['id_capteur']) {
                $update = $connect->prepare("UPDATE capteurs set valeur=? WHERE id=?");
                $update->execute(array($valeur,
                    $id_capteur
                ));

                echo "- ".$nom." -<br>";
                if ($etat == 1){
                    echo $valeur . " cm";
                }
            }

            if ($capteur_actionneur == "humidite") {
                echo "- ".$nom." -<br>";
                if ($etat == 1){
                    echo $valeur . "";
                }
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

        /*setInterval(function(){
            $.ajax({
                url:"model/fetch_trame.php",
                method:"POST",
                /*
                success:function(data){
                    $('.result').html(data);
                }
                */
          /*  });
        },3000);*/
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