<?php
    session_start();
?>
<html>

<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="modification_piece(abd).css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>

<body class="fond">

    <div id="site">     
        
        <?php
            include "header.php";
        ?>
        
        <?php 
            $link = $_GET['id'];
        ?>
        <?php
            $id_habitation = $_GET['id2'];
        ?>
        <div class="tab">  
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

                $req = $bdd->prepare('SELECT type, nom, id FROM pieces WHERE id_habitation= ? ');
                $req->execute(array($_SESSION["id_habitation"]));

                while ($donnees = $req->fetch())
                {
                    $piece = $donnees['nom'];
                    $id = $donnees['id'];

                    ?> <a href = "modification_piece(abd).php?id=<?php echo $id; ?>&id2=<?php echo $_SESSION["id_habitation"]; ?>" class = "choix" id= '<?php echo $id; ?>'> <button class="tablinks" id="tablink1"> <?php echo $piece; ?> </button></a>
                    <?php
                }
            ?>
        </div>
        
        <div class="centre">

            <br>

            <div class="piece">
                <?php echo $piece 
                ?>
                <img class="image" src="image/<?php echo"$piece"?>.jpg"/>
                <div class="nom_piece">
                    <?php
                    $req = $bdd->prepare('SELECT type FROM pieces WHERE id= ? ');
                    $req->execute(array($link));

                    while ($donnees = $req->fetch())
                    {
                        $piece = $donnees['type'];
                    }
                    ?>

                    <?php
                        echo $piece;
                    ?>
               
               </div>

            </div>

            <br>

                
            <div class="info_piece">
                <div class="case_modif">
                    <a href="inscription_habitant_5.php?id=<?php echo $id_habitation; ?>" class="boutonModif"> Modifier </a>
                    </div>
                    <div class="case_info">
                                <?php

                        $req = $bdd->prepare('SELECT surface FROM pieces WHERE id= ? ');
                        $req->execute(array($link));
                        while ($donnees = $req->fetch())
                        {
                            $surface = $donnees['surface'];
                        }
                        echo "Surface : $surface m2";
                    ?>
                    </br>
                    <?php

                        $req = $bdd->prepare('SELECT * FROM capteurs WHERE id_piece = ? ');
                        $req->execute(array($_GET['id']));

                        $counter=0;  
                        while ($donnees = $req->fetch())
                        {
                            $counter++;
                        }

                        echo 'Nombre de capteurs : ' . $counter;
                    ?>

                    </br>
                    <?php
                        $nbCapteursActifs=2;
                        echo ' Capteurs actifs : ' ;
                    ?>

                    </div>
                
                <br>

            </div>

            <div class="case_capteurs">
                <div class="info_capteurs">Liste des capteurs:<hr></div>

                <div class="liste_capteurs">
                    <?php     

                    $req = $bdd->prepare('SELECT type, nom, id FROM capteurs WHERE id_piece= ? ');
                    $req->execute(array($_GET['id']));
                    while ($donnees = $req->fetch())
                    {
                        $capt = $donnees['id'];
                        ?><a class = "suppr" href="modification_piece_delete_post.php?id2=<?php echo $capt; ?>&id=<?php echo $link; ?>"> x </a><?php
                        echo "- ".$donnees['nom']." (type : ".$donnees['type'].")"."<br/>";
                    }
                    ?>
                </div>
            </div>

            <div class="case_ajout">
                <div class="case_ajout1">definir un capteur <hr></div>
                <div class="case_ajout2">
                    

                <form action ="modification_piece_post.php?id=<?php echo $link;?>&id2=<?php echo $id_habitation; ?>" method="post" class="nommage">
                    <br/>
                    <div > Choisir un capteur
                    <select name="type"  style="height: 30px; width: 220px;">
                        <option value="temperature"> Température </option>
                        <option value="luminosite"> Luminosité </option>
                        <option value="presence"> Présence </option>
                        <option value="led"> Led </option>
                        <option value="humidite"> Humidité </option>
                        <option value="fenetre"> Fenêtre </option>
                        <option value="sonore"> Sonore </option>
                    </select></div>
                    <br/>
                    <div>Nommer votre capteur
                    <input type="text" name="nom" size="27" maxlength="15" style="height: 30px; text-align: center; margin-left: 10px" /></div>
                    <br/>
                    <div>Entrer l'ID du capteur                 
                    <input class="idcapteur" type="text" name="IDcapteur" size="27" maxlength="20" style="height: 30px; text-align: center; margin-left: 35px" /></div> 
                    <br/>
                    <input type="submit" class="boutonAjout" name="valider" value="Ajouter" style="margin-left: 365px; width:220px" />
                </form>
              </div>
            </div>
        </div>

    </div>       

    <?php
        include "footer.php";
    ?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="choix_piece.js"></script>

</body>
</html>