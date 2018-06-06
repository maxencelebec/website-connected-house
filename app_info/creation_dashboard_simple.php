<link rel="stylesheet" href="création_dashboard_simple.css"/>

<?php

function creation_dashboard_simple($nom_maison)
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

?>


<div>

    <div>
        <div class="case21"></div>
        <div class="informations">
            <div class="maison_1">
                <div class="case2211"></div>
                <div class="maison_conso">
                    <div class="maison">



                        <?php
                        $req = $bdd->prepare('SELECT id FROM users WHERE mail= ? ');
                        $req->execute(array($_SESSION['mail']));

                        while ($donnees = $req->fetch())
                        {
                            $_SESSION['id_user'] = $donnees['id'];
                            echo "Maison : $nom_maison";
                        }

                        $req = $bdd->prepare('SELECT id FROM habitation WHERE nom=?');
                        $req->execute(array($nom_maison));
                        while ($donnees = $req->fetch())
                        {
                            $id_habitation = $donnees['id'];

                        }

                        ?>

                    </div>

                    <div class="chartContainer">

                        <?php

                        $req = $bdd->prepare('SELECT id FROM habitation WHERE nom=?');
                        $req->execute(array($nom_maison));
                        while ($donnees = $req->fetch())
                        {
                            $id_habitation = $donnees['id'];
                            require ('./views/graphics_ctlr/graphtest.php');

                        }



                        ?>

                    </div>

                </div>
                <div class="case2213"></div>
                <div class="donnees">
                    <div class="temp_mode_secu">
                        <div class="temperature">
                            Température

                        </div>
                        <div class="modemaison">
                            <a href="mode_maison.php?id=<?php echo $id_habitation; ?>">
                                <div class="modemaison1">Mode Maison <br>
                                
                                    <?php

                                    $req = $bdd->prepare('SELECT mode FROM habitation WHERE id=?');
                                    $req->execute(array($id_habitation));

                                    while ($donnees = $req->fetch())

                                    {
                                        $mode = $donnees['mode'];

                                        if ($mode==1) {
                                            ?>
                                            <img src="image/eco-mode-dash.png" style="height: 65%" width="50%"/>
                                            <?php
                                        }
                                        elseif ($mode==2) {

                                            ?>
                                            <img src="image/moyen-mode-dash.png" style="height: 40%" width="40%"/>
                                            <?php
                                        }
                                        elseif ($mode==3) {

                                            ?>
                                            <img src="image/max-mode-dash.png" style="height: 65%" width="50%"/>
                                            <?php
                                        }

                                    }

                                    ?>
                                
                                </div>
                            </a>
                        </div>
                        <div class="securite">Sécurité</div>
                    </div>
                    <div class="capteurs">
                        <div class="titre">Capteurs</div>
                        <div class="infos">
                            <div class="actifs"> Actifs :

                                <?php

                                $req = $bdd->prepare('SELECT etat FROM capteurs WHERE (id_habitation=?) AND (etat=?)');
                                $req->execute(array($id_habitation, 1));
                                $cap_actif=0;
                                while ($donnees = $req->fetch())
                                {
                                    $cap_actif++;

                                }
                                echo $cap_actif;
                                ?>

                            </div>
                            <div class="inactifs"> Inactifs :

                                <?php

                                $req = $bdd->prepare('SELECT etat FROM capteurs WHERE (id_habitation=?) AND (etat=?)');
                                $req->execute(array($id_habitation, 0));
                                $cap_inactif=0;
                                while ($donnees = $req->fetch())
                                {
                                    $cap_inactif++;

                                }
                                echo $cap_inactif;
                                ?>

                            </div>
                            <div class="erreur"> Erreur :

                                <?php

                                $req = $bdd->prepare('SELECT etat==1 FROM capteurs WHERE id_habitation=?');
                                $req->execute(array($id_habitation));
                                $cap_erreur=0;
                                while ($donnees = $req->fetch())
                                {
                                    $cap_erreur++;

                                }
                                echo $cap_erreur;
                                ?>

                            </div>
                        </div>
                    </div>
                    <div class="qui_autresoptions">
                        <div class="quiestalamaison">Qui est à la maison ? </br></br>
                            <?php

                            $req = $bdd->prepare('SELECT name,firstname FROM users WHERE mail=?');
                            $req->execute(array($_SESSION["mail"]));
                            while ($donnees = $req->fetch())
                            {

                                echo "<p style='color: #2cc872'>".$donnees["firstname"]." ".$donnees["name"]."</p>";
                            }

                            ?>
                        </div>
                        <div class="autresoptions">
                            <a class="lien2" href="dashboard_maison.php?id=<?php echo $id_habitation; ?>">
                                <div class="autresoptions1">Autres Options<br>...</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="case2215"></div>
            </div>

        </div>
        <div class="case23"></div>
    </div>

</div>

    <?php
}
?>
