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
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
</head>

<body>

        <div class="ct-chart ct-perfect-fourth"></div>

        <script>

            var tab_time = [];
            var tab_val = [];

        </script>

        <?php
        $nom = "temp1";

        $req = $bdd->prepare('SELECT timestamp FROM graph_test WHERE nom= ? ');
        $req->execute(array($nom));

        while ($donnees = $req->fetch())
        {
            $time = $donnees['timestamp'];
            $time = strval($time);
            $time = "'$time'";
            echo $time;
            ?> <script>

            tab_time.push(<?php $time ?>),

            </script> <?php

        }


        $req = $bdd->prepare('SELECT valeur FROM graph_test WHERE nom= ? ');
        $req->execute(array($nom));

        while ($donnees = $req->fetch())
        {
            $val = $donnees['valeur'];
            echo $val;
            ?> <script>

            tab_val.push(<?php $val ?>),

        </script> <?php

        }

        ?>

        <script>

        var data = {

            labels: tab_time,

            series: [tab_val]

        };

        new Chartist.Line('.ct-chart', data);

    </script>

</body>
</html>