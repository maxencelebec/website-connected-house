<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Virifocus | Inscription</title>
    <link rel="stylesheet" href="inscription_habitant_5.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="fond">

<div id="menu">

    <div class="case1">
        <div class="case11"></div>
        <div class="case12">
            <div class="case1212"><br><br>Home</div></a></div>
        <div class="case13">
            <div class="case1313"><br><br>Compte</div></a></div>
        <div class="case14">
            <div class="case1414"><br><br>Paramètres</div></a></div>
        <div class="case15">
            <div class="case1515"><br><br>Aide</div></a></div>
        <div class="case16"></div>
    </div>
</div>


<div class="Main">
    <div class= "formul">
        <form class="infos" action="inscription_habitant_5_post" method="post">

            <div class="titre"><h1>Créez votre maison</h1></div>
            <div class="stitre"><h2>Définissez une pièce de votre habitation</h2></div>

            <div class="formulaire">

                <div>Pièce :</div>
                <div>Surface (m2)</div>
                <input type="text" name="nom" maxlenght="255" style="text-align: center" required />
                <input type="number" name="surface" maxlenght="255" style="text-align: center" required />
                <input class="valider" type="submit" value="Valider">


            </div>
        </form>
        <div class="captcha">

            <a class="lien" href="dashboard_simple.php"><p>Lancer la session</p></a>
        </div>
    </div>

    <div class = "tableau_pieces">
        <?php
            try
            {
                $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
            }
            catch(Exception $e)
            {
                    die('Erreur : '.$e->getMessage());
            }
            $req = $bdd->prepare('SELECT id FROM users WHERE mail= ? ');
            $req->execute(array($_SESSION["mail"]));

            $id_user;
            while ($donnees = $req->fetch())
            {
                $id_user=$donnees['id'];
            }

            $req = $bdd->prepare('SELECT id FROM habitation WHERE id_user= ? ');
            $req->execute(array($id_user));

            $id_habitation;
            while ($donnees = $req->fetch())
            {
                $id_habitation=$donnees['id'];
            }

            $req = $bdd->prepare('SELECT nom, surface FROM pieces WHERE id_habitation= ? ');
            $req->execute(array($id_habitation));

            $id_habitation;
            while ($donnees = $req->fetch())
            {
                echo $donnees['nom']. " de ".$donnees['surface']."m2<br/>";
            }


        ?>
    </div>


</div>

</body>

</html>