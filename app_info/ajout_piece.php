<link rel="stylesheet" href="ajout_piece.css"/>

<?php

function ajout_piece($piece,$id)
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

        <div class="type_piece">
            <div class="piece_titre_donnees">
                <div class="photo_<?php echo $piece ?>">
                    <?php
                    $req = $bdd->prepare('SELECT nom FROM pieces WHERE id= ? ');
                    $req->execute(array($id));

                    while ($donnees = $req->fetch())
                    {
                        echo $donnees['nom'];
                    }
                    ?>
                </div>
                <div class ="donnees">
                    <div class="temp">
                        <div class="temp_img"></div>
                        <div class="temp_txt">
                            <?php
                            $ask = $bdd->prepare('SELECT valeur FROM capteurs WHERE id_piece=? && type="temperature"');
                            $ask->execute(array($id));
                            $counter=0;
                            while ($donnees = $ask->fetch())
                            {
                                echo hexdec($donnees['valeur'])."°C";
                                $counter=1;
                            }
                            if ($counter==0){echo "?";}

                            ?>
                        </div>
                    </div>
                    <div class="lum">
                        <div class="lum_img"></div>
                        <div class="lum_txt">
                            <?php
                                $boutton = 2;
                                include 'boutton.php';
                            ?>
                        </div>
                    </div>
                    <div class="err">
                        <div class="err_img"></div>
                        <div class="err_txt">Erreur <br/>capteur : <?php echo $piece ?></div>
                    </div>
                    
                </div>
            </div>
            <div class="cuisine_capteurs">

                <?php
                    include_once "ajout_capteur.php";
                    try
                    {
                        $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                    }
                    catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }

                    $req = $bdd->prepare('SELECT id, type FROM capteurs WHERE id_piece= ? ');
                    $req->execute(array($id));

                    while ($donnees = $req->fetch())
                    {
                        $type = $donnees['type'];
                        $id_capteur = $donnees['id'];
                        ajout_capteur("$type","$id","$id_capteur");
                    }
                ?>

            </div>

        </div>
        <?php

    }
?>


<!-- 
        <div class="boutton2">
            <button class="ajoutercapteur" onclick="change()">+</button>
        </div>
-->