<?php
session_start();
<<<<<<< HEAD
$_SESSION['type']=1;
=======


>>>>>>> 154528d747fabd0b40487eba7a76622a9321593c
?>

<!DOCTYPE html>

</html>

    <link rel="stylesheet" href="dashboard_administrateur.css" />
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="chartist/chartist-js-master/dist/chartist.min.jsh"></script>

</head>
<body class="fond">
<div id="site">
    <?php
    include "header.php";
    ?>
    <div class="main">

        <div class="infos1">
            <div class="titre">Informations du site</div>
            <div class="graphe1">graphe 1 : nombre de connexions par jour</div>


            <div id="chartConnexion">

                <?php

                    require ('./graph_connexion.php');

                ?>

            </div>

            <div class="graphe2">graphe 2 : nombre d'inscriptions par jour/semaine/mois</div>

            <div id="chartInscription">

                <?php

                require ('./graph_inscription.php');

                ?>

            </div>


        </div>


        <div class="infos2">
            <div class="titre">Informations habitations</div>
            <div class="graphe3">graphe 3 : </div>
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
        </div>

    </div>


    <?php
    include "footer.php";
    ?>

</div>

</body>
<script src="dashboard_maison.js"></script>



</html>

