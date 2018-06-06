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

$date_compteur = 0;

while ($date_compteur < 7)
{
    $date = date('Y-m-d');
    $date = strtotime ( "-6 day" , strtotime ( $date ) ) ;
    $date = date ( 'Y-m-j' , $date );

    $date = strtotime ( "+$date_compteur day" , strtotime ( $date ) ) ;
    $date = date ( 'm-d', $date);

    $date = "'$date'";

    $date_compteur = $date_compteur + 1;

    ?> <script>

    tab_time.push(<?php echo $date ?>);

</script> <?php

}
    $date_debut = date('Y-m-d');
    $date_fin = date('Y-m-d');

    $date_debut = strtotime ( "-7 day" , strtotime ( $date_debut ) ) ;
    $date_fin = strtotime ( "-7 day" , strtotime ( $date_fin ) ) ;

    $date_debut = date ( 'Y-m-d 00:00:00' , $date_debut );
    $date_fin = date ( 'Y-m-d 23:59:59' , $date_fin );

    $date_compteur2 = 0;

while ($date_compteur2 < 7) {

    $date_debut = strtotime ( "+1 day" , strtotime ( $date_debut ) ) ;
    $date_debut = date ( 'Y-m-d 00:00:00', $date_debut);
    $date_fin = strtotime ( "+1 day" , strtotime ( $date_fin ) ) ;
    $date_fin = date ( 'Y-m-d 23:59:59', $date_fin);

    $date_compteur2 = $date_compteur2 + 1;

    $req = $bdd->prepare('SELECT COUNT(*) as total FROM stats WHERE ((type= ?) and (date >= ?) and (date < ?))');
    $req->execute(array('connexion', $date_debut, $date_fin));

    while ($donnees = $req->fetch())
    {
        $val = $donnees['total'];

        ?> <script>

        tab_val.push(<?php echo $val ?>);

    </script><?php

    }
}
    ?>


<style>

    .ct-series-a .ct-line {
        /* Set the colour of this series line */
        stroke: #2ecc71;
        /* Control the thikness of your lines */
        stroke-width: 4px;
    }

    .ct-series-a .ct-point {
        /* Colour of your points */
        stroke: #2ecc71;
        /* Size of your points */
        stroke-width: 12px;
        /* Make your points appear as squares */
        stroke-linecap: round;
    }

    .ct-grid {
        stroke: grey;
    }

    .ct-label.ct-label.ct-horizontal {
        color: grey;
        position: fixed;
        justify-content: flex-end;
        text-align: right;
        transform-origin: 100% 0;
        transform: translate(-100%) rotate(-45deg);
    }

    }

    .ct-chart, .ct-label.ct-vertical {
        color: grey;

    }

    .ct-series-a .ct-area {
        fill: grey;

    }


</style>


<script>

    var data = {

        labels: tab_time,
        series: [tab_val]

    };

    var options = {
        width: 500,
        height: 300,
        showArea : true,
        fullWidth : true,
    };

    new Chartist.Line('.ct-chart', data, options);

</script>

</body>
</html>