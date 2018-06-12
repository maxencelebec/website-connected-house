<?php
try
{
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

session_start();
$_SESSION['type']=3;
?>

<!DOCTYPE html>
<html>
<head>
    <title> Virifocus </title>
    <meta charset="utf-8"/>

    <link rel="stylesheet" href="dashboard_technicien.css"/>

    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>

</head>
<body class="fond">
    <div id="site">

        <?php
        include "header.php";
        ?>

        <div class="main" style="color: black">


            <div class="info">
                <table>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Id Utilisateur</th>
                        <th>Plus</th>
                    </tr>
                    <?php
                    try {
                        $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }
                    $req = $bdd->prepare('SELECT id, Date_Heure, id_utilisateur, contenu_msg, id_habitation  FROM message ORDER BY Date_Heure');
                    $req->execute();
                    while ($donnees = $req->fetch()) {
                        $id=$donnees['id'];?>
                        <tr>

                            <td>
                                <?php
                                $date = date('d/m/Y', strtotime($donnees['Date_Heure']));
                                echo $date;
                                ?>
                            </td>
                            <td>
                                <?php
                                $time = date('H:i:s', strtotime($donnees['Date_Heure']));
                                echo $time;
                                ?>
                            </td>
                            <td><?= $donnees['id_utilisateur'];?></td>
                            <td><button id="<?= $donnees['id']; ?>" class="bouton" onclick="message()">+</button></td>
                        </tr>
                        <script>
                            $(document).ready(function(){
                                $('button[id="<?= $id ?>"]').click(function(){
                                    var id_msg = <?= $id;?>;
                                    $.ajax({
                                        url:"test.php",
                                        method:"POST",
                                        data:{id:id_msg},
                                        success:function(data){
                                            $('#contenu').html(data);
                                        }

                                    });
                                });
                            });
                        </script>

                        <?php
                    }
                    ?>
                </table>
            </div>

            <form id="message" method="post" action="">
                <p style="font-size:20px">Message du client : </p>
                <div id="contenu"></div>
                <p style="font-size:20px">Votre réponse : </p>
                <textarea id="repondre"></textarea><br>
                <input type="submit" value="Envoyer" class="envoie">
                <button id="close" data-ido="56" onclick="fermer()">close</button>
            </form>


        </div>

        <?php
        include "footer.php";
        ?>

    </div>

</body>
<script src="dashboard_technicien.js"></script>
</html>
