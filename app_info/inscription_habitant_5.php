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



            </div>

            <div class="boutton2">
                <a href="#" class="lien3">
                    <button class="ajoutermaisonlink" onclick="">+</button>
                </a>
            </div>

            <div class="captcha">

                <br/>
                <input class="valider" type="submit" value="Ajouter">

                <a class="lien" href="inscription_habitant_4.php"><p>Next Page Debug</p></a>

            </div>

        </form>
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
            $req = $bdd->prepare('SELECT name FROM users WHERE mail=?');
            $req->execute(array($_SESSION["mail"]));
            while ($donnees = $req->fetch())
            {
                echo $donnees['name'];
            }

        ?>
    </div>


</div>

</body>

</html>