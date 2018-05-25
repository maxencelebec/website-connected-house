        <div class="ct-chart ct-perfect-fourth"></div>



        <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
        <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

<style>

        .ct-series-a .ct-line {
        /* Set the colour of this series line */
        stroke: #2ecc71;
        /* Control the thikness of your lines */
        stroke-width: 4px;
        }

        .ct-series-a .ct-point {
            /* Colour of your points */
            stroke: white;
            /* Size of your points */
            stroke-width: 12px;
            /* Make your points appear as squares */
            stroke-linecap: round;
        }

        .ct-grid {
            stroke: white;
        }

        .ct-chart, .ct-label {
            color: white;
        }


</style>

        <script>



            var tab_time = [];
            var tab_val = [];

        </script>


        <?php
        $nom = "temp1";

        // Connexion à la base de données
        try
        {
            $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
            echo "non connecté à la bdd";
        }

        $req = $bdd->prepare('SELECT timestamp FROM graph_test WHERE nom= ? ');
        $req->execute(array($nom));

        while ($donnees = $req->fetch())
        {
            $time = $donnees['timestamp'];
            $time = strval($time);
            $time = substr($time, 10, 6);
            $time = "'$time'";

            ?> <script>

            tab_time.push(<?php echo $time ?>);

            </script> <?php

        }


        $req = $bdd->prepare('SELECT valeur FROM graph_test WHERE nom= ? ');
        $req->execute(array($nom));

        while ($donnees = $req->fetch())
        {
            $val = $donnees['valeur'];

            ?> <script>

            tab_val.push(<?php echo $val ?>);

        </script>

        <?php

        }
        ?>

        <script>

        var data = {

            labels: tab_time,
            series: [tab_val],
            showArea: true,
        };

        new Chartist.Line('.ct-chart', data);

        </script>