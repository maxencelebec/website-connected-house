<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Virifocus </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="dashboard_simple.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>

</head>
<body class="fond">

            <div id="site">

                <?php
                    include "header.php";
                ?>

                <div class="main">
                    <div class="case21"></div>
                    <div class="informations">
                        <div class="maison_1">
                            <div class="case2211"></div>
                            <div class="maison_conso">
                                <div class="maison">Maison : Casa de papel</div>
                                    <div class="chartContainer"></div>
                            </div>
                            <div class="case2213"></div>
                            <div class="donnees">
                                <div class="temp_mode_secu">
                                    <div class="temperature">
                                        Température

                                    </div>
                                    <div class="modemaison">Mode Maison</div>
                                    <div class="securite">Sécurité</div>
                                </div>
                                <div class="capteurs">
                                    <div class="titre">Capteurs</div>
                                    <div class="infos">
                                        <div class="actifs">Actifs : 22</div>
                                        <div class="inactifs">Inactifs : 3</div>
                                        <div class="erreur">Erreur : 2</div>
                                    </div>
                                </div>
                                <div class="qui_autresoptions">
                                    <div class="quiestalamaison">Qui est à la maison ? </br></br>
                                            <?php
                                                try
                                                {
                                                    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                                                }
                                                catch(Exception $e)
                                                {
                                                        die('Erreur : '.$e->getMessage());
                                                }
                                                $req = $bdd->prepare('SELECT name,firstname FROM users WHERE mail=?');
                                                $req->execute(array($_SESSION["mail"]));
                                                while ($donnees = $req->fetch())
                                                {
                                                    echo "<p style='color: #2cc872'>".$donnees["firstname"]." ".$donnees["name"]."</p>";
                                                }
                                            ?>
                                    </div>
                                    <div class="autresoptions">
                                        <a class="lien2" href="dashboard_maison.php">
                                            <div class="autresoptions1">Autres Options<br>...</div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="case2215"></div>
                        </div>
                        <div class="ajoutmaison">
                            <div></div>
                            <div class="boutton2">
                                <a href="inscription_habitant_3.php" class="lien3">
                                    <button class="ajoutermaisonlink" onclick="">+</button>
                                </a>
                            </div>
                            <div></div>
                            <div class="ajoutermaison">Ajouter Maison</div>
                        </div>
                    </div>
                    <div class="case23"></div>
                </div>

                <?php
                    include "footer.php";
                ?>

            </div>

            <script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
            <script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</body>
<script src="dashboard_simple.js"></script>
</html>
