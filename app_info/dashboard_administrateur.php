<?php
session_start();
$_SESSION['type']=1;

try
{
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

<!DOCTYPE html>

<html>
<head>
    <title> Virifocus </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="dashboard_administrateur.css" />
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="chartist/chartist-js-master/dist/chartist.min.jsh"></script>

<body class="fond">
<div id="site">
    <?php
    include "header.php";
    ?>
    <div class="main">

        <div class="infos1">
            <div class="titre">Informations du site</div>
            <div class="graphe1">Nombre de connexions par jour :</div>


            <div id="chartConnexion">

                <?php

                    require ('./graph_connexion.php');

                ?>

            </div>

            <div class="graphe2">Nombre d'inscriptions par jour : </div>

            <div id="chartInscription">

                <?php

                require ('./graph_inscription.php');

                ?>

            </div>


        </div>


        <div class="infos2">
            <div class="titre">Informations habitations</div>


            <?php

            $req = $bdd->prepare('SELECT COUNT(*) as total FROM habitation');
            $req->execute();

            while ($donnees = $req->fetch())
            {
                $val = $donnees['total'];}
            ?>

            <div> Nombre total d'habitations : <?php echo $val; ?></div>

            <div class="graphe3">Nombre d'habitations connectées par jour : </div>

            <div id="chartNbHabitations">

                <?php

                require ('./graph_nbhabitation.php');

                ?>

            </div>

            <div class="graphe4">

                <button class="liste" onclick="change()">Liste des utilisateurs</button>
                <div id="fenetre">
                    <button id="close" data-ido="56" onclick="fermer()">=></button>
                    <table>
                        <tr>
                            <th></th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Mail</th>
                            <th>Adresse</th>
                            <th>Pays</th>
                            <th>Ville</th>

                        </tr>
                        <?php
                        try {
                            $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                        } catch (Exception $e) {
                            die('Erreur : ' . $e->getMessage());
                        }
                        $req = $bdd->prepare('SELECT id, mail, name, firstname, address, city, country  FROM users');
                        $req->execute(array($_SESSION["mail"]));
                        while ($donnees = $req->fetch()) {?>
                            <tr>
                                <td class="clean"> <a class="clean" href="supprimer_utilisateur_post.php?id=<?= $donnees['id']; ?>">Supprimer</a> </td>
                                <td><?= $donnees['firstname'];?></td>
                                <td><?= $donnees['name'];?></td>
                                <td><?= $donnees['mail'];?></td>
                                <td><?= $donnees['address'];?></td>
                                <td><?= $donnees['city'];?></td>
                                <td><?= $donnees['country'];?></td>
                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                </div>

            </div>


            <div class="cartehabitations">

                <button class="liste" onclick="changemaphab()">Carte des habitations</button>
                <div id="fenetre">
                    <button id="close" data-ido="56" onclick="fermer()">=></button>
                    <?php
                    include "./geocode.php";
                    ?>
                </div>

            </div>



        </div>

    </div>


    <?php
    include "footer.php";
    ?>

</div>

</body>
<script src="dashboard_maison.js"></script>



</html>

