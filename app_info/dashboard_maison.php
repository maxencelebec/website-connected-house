<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Virifocus </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="dashboard_maison.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>

</head>
<body class="fond">
            <div id="site">
                
                <?php
                    include "header.php";
                ?>

                <div class="main1">
                    <div class="photo_nom">
                        <div class="photomaison"></div>
                        <div class="nommaison">Casa de Papel</div>
                    </div>
                    <div class="cadre_info_fixe">
                        <div class="home_mode_titre">Home Mode</div>
                        <div class="home_mode">
                            <div id="eco_mode" onclick="mode_eco()">Eco</div>
                            <div id="moyen_mode" onclick="mode_moyen()">Moyen</div>
                            <div id="max_mode" onclick="mode_max()">Max</div>
                        </div>
                        <div class="securite_titre">Sécurité</div>
                        <div class="securite">
                            <div class="boutton_onoff">
                                <label class="switch">
                                    <input type="checkbox">
                                    <span class="slider round"></span>
                                </label><br>ON/OFF</div>
                        </div>
                        <div class="utilisateur_titre">Utilisateur<br>Connecté</div>
                        <div class="utilisateur">
                            <?php
                                echo "<p style='color: #2cc872'>".$_SESSION["prenom"]."</p>"; 
                             ?>
                        </div>
                    </div>
                </div>
                    



                <div class="main2">
                    <div class="informations">
                        <div class="informations_valeur">
                            <div id="eau" onclick="eau()">
                                <div class="case31111">Eau</div>
                                <div class="case31112">175L</div>
                            </div>
                            <div id="temperature" onclick="temperature()">
                                <div class="case31121">Température</div>
                                <div class="case31122">23°C</div>
                            </div>
                            <div id="consommation" onclick="consommation()">
                                <div class="case31131">Consommation<br>Energétique</div>
                                <div class="case31132">750kW</div>
                            </div>
                        </div>
                        <div class="informations_graphe">
                            <div id="triangle1"></div>
                        </div>
                        <div class="fond_triangle"></div>
                    </div>
                    <div class="control_pieces">
                        <div class="cuisine">
                            <div class="cuisine_titre">cuisine</div>
                            <div class="cuisine_capteurs">
                                <div class="case32121">a</div>
                                <div class="case32121">b</div>
                                <div class="case32121">c</div>
                                <div class="case32121">d</div>
                                <div class="case32121">e</div>
                                <div class="case32121">f</div>

                            </div>
                            
                            <div class="boutton2">
                                <button class="ajoutercapteur" onclick="change()">+</button>
                            </div>
                            
                        </div>
                        <div class="case322">salon</div>
                        <div class="case323">chambre 1</div>
                        <div class="case321">d</div>
                        <div class="case322">a</div>
                        <div class="case323">d</div>
                        <div class="case321">a</div>

                        <div class="boutton1">
                            <button class="ajouterpiece"> + modifier pièce </button>
                        </div>

                        
                    </div>
                </div>

                <?php
                    include "footer.php";
                ?>

            </div>

        <div id="fenetre"> 
            <button id="close" onclick="fermer()"> x </button>
            fenetre pop-up 
        </div>
</body>
<script src="dashboard_maison.js"></script>
</html>

