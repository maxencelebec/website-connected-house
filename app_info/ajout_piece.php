<link rel="stylesheet" href="ajout_piece.css"/>

<?php

function ajout_piece($piece)
{
    if ($piece=="cuisine")
    {
    ?>
        <div class="cuisine">
            <div class="cuisine_titre_donnees">
                <div class="photo_cuisine">Cuisine</div>
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
            <div class="cuisine_capteurs">
                <?php
                    include_once "ajout_capteur.php";
                    ajout_capteur("presence");
                    ajout_capteur("humidité");
                    ajout_capteur("temperature");
                    ajout_capteur("porte");
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
                    include_once "ajout_capteur.php";
                    ajout_capteur("porte");
                    ajout_capteur("presence");
                    ajout_capteur("luminosité");
                    ajout_capteur("temperature");

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
                    include_once "ajout_capteur.php";
                    ajout_capteur("porte");
                    ajout_capteur("luminosité");
                    ajout_capteur("presence");
                    ajout_capteur("porte");
                    ajout_capteur("luminosité");
                    ajout_capteur("presence");
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
                    include_once "ajout_capteur.php";
                    ajout_capteur("temperature");
                    ajout_capteur("humidité");
                    ajout_capteur("luminosité");
                    ajout_capteur("temperature");
                    ajout_capteur("humidité");
                    ajout_capteur("luminosité");
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
                    include_once "ajout_capteur.php";
                    ajout_capteur("luminosité");
                    ajout_capteur("presence");
                    ajout_capteur("porte");
                    ajout_capteur("luminosité");
                    ajout_capteur("presence");
                    ajout_capteur("porte");
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