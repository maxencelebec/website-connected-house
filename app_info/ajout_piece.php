<link rel="stylesheet" href="ajout_piece.css"/>

<?php

function ajout_piece($piece,$id)
{
    if ($piece=="cuisine")
    {
    ?>
        <div class="cuisine">
            <div class="cuisine_titre_donnees">
                <div class="photo_<?php echo $piece ?>">Cuisine</div>
                <div class ="donnees">
                    <div class="temp">
                        <div class="temp_img"></div>
                        <div class="temp_txt">23°C</div>
                    </div>
                    <div class="lum">
                        <div class="lum_img"></div>
                        <div class="lum_txt">
                            <?php
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

                    try
                    {
                        $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                    }
                    catch(Exception $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }

                    $req = $bdd->prepare('SELECT type FROM capteurs WHERE id_piece= ? ');
                    $req->execute(array($id));

                    while ($donnees = $req->fetch())
                    {
                        $type = $donnees['type'];
                        include_once "ajout_capteur.php";
                        ajout_capteur("$type","$id");
                    }
                ?>

            </div>

        </div>
        <?php
    }


    elseif($piece == "chambre"){
        ?>
        <div class="chambre">
            <div class="chambre_titre_donnees">
                <div class="photo_chambre">Chambre</div>
                    <div class ="donnees">
                    <div class="temp">
                        <div class="temp_img"></div>
                        <div class="temp_txt">23°C</div>
                    </div>
                    <div class="lum">
                        <div class="lum_img"></div>
                        <div class="lum_txt">
                            <?php
                                include 'boutton.php';
                            ?></div>
                    </div>
                    <div class="err">
                        <div class="err_img"></div>
                        <div class="err_txt">Erreur <br/>capteur : 2</div>
                    </div>
                    
                </div>
            </div>
            <div class="chambre_capteurs">

                <?php

                try
                {
                    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }

                $req = $bdd->prepare('SELECT type FROM capteurs WHERE id_piece= ? ');
                $req->execute(array($piece));

                while ($donnees = $req->fetch())
                {
                    $type = $donnees['type'];
                    include_once "ajout_capteur.php";
                    ajout_capteur("$type");
                }
                ?>

            </div>
        </div>
        <?php
    }


    elseif($piece == "salle_de_bain"){
        ?>
        <div class="salle_de_bain">
            <div class="salle_de_bain_titre_donnees">
                <div class="photo_salle_de_bain">Salle de bain</div>
                <div class ="donnees">
                    <div class="temp">
                        <div class="temp_img"></div>
                        <div class="temp_txt">23°C</div>
                    </div>
                    <div class="lum">
                        <div class="lum_img"></div>
                        <div class="lum_txt">
                            <?php
                                include 'boutton.php';
                            ?>
                        </div>
                    </div>
                    <div class="err">
                        <div class="err_img"></div>
                        <div class="err_txt">Erreur <br/>capteur : 2</div>
                    </div>
                    
                </div>
            </div>
            <div class="salle_de_bain_capteurs">

                <?php

                try
                {
                    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }

                $req = $bdd->prepare('SELECT type FROM capteurs WHERE id_piece= ? ');
                $req->execute(array($piece));

                while ($donnees = $req->fetch())
                {
                    $type = $donnees['type'];
                    include_once "ajout_capteur.php";
                    ajout_capteur("$type");
                }
                ?>

            </div>   
        </div>
        <?php
    }   


    elseif($piece == "salon"){
        ?>
        <div class="salon">
            <div class="salon_titre_donnees">
                <div class="photo_salon">Salon</div>
                <div class ="donnees">
                    <div class="temp">
                        <div class="temp_img"></div>
                        <div class="temp_txt">23°C</div>
                    </div>
                    <div class="lum">
                        <div class="lum_img"></div>
                        <div class="lum_txt">
                            <?php
                                include 'boutton.php';
                            ?>
                        </div>
                    </div>
                    <div class="err">
                        <div class="err_img"></div>
                        <div class="err_txt">Erreur <br/>capteur : 2</div>
                    </div>
                    
                </div>
            </div>
            <div class="salon_capteurs">

                <?php

                try
                {
                    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }

                $req = $bdd->prepare('SELECT type FROM capteurs WHERE id_piece= ? ');
                $req->execute(array($piece));

                while ($donnees = $req->fetch())
                {
                    $type = $donnees['type'];
                    include_once "ajout_capteur.php";
                    ajout_capteur("$type");
                }
                ?>

            </div>   
        </div>
        <?php
    }


    elseif($piece == "cave"){
        ?>
        <div class="cave">
            <div class="cave_titre_donnees">
                <div class="photo_cave">Cave</div>
                <div class ="donnees">
                    <div class="temp">
                        <div class="temp_img"></div>
                        <div class="temp_txt">23°C</div>
                    </div>
                    <div class="lum">
                        <div class="lum_img"></div>
                        <div class="lum_txt">
                            <?php
                                include 'boutton.php';
                            ?>
                        </div>
                    </div>
                    <div class="err">
                        <div class="err_img"></div>
                        <div class="err_txt">Erreur <br/>capteur : 2</div>
                    </div>
                    
                </div>
            </div>
            <div class="cave_capteurs">

                <?php

                try
                {
                    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                }
                catch(Exception $e)
                {
                    die('Erreur : '.$e->getMessage());
                }

                $req = $bdd->prepare('SELECT type FROM capteurs WHERE id_piece= ? ');
                $req->execute(array($piece));

                while ($donnees = $req->fetch())
                {
                    $type = $donnees['type'];
                    include_once "ajout_capteur.php";
                    ajout_capteur("$type");
                }
                ?>

            </div>           
        </div>
        <?php
    }

}
                            
?>


<!-- 
        <div class="boutton2">
            <button class="ajoutercapteur" onclick="change()">+</button>
        </div>
-->