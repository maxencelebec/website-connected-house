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
            <div class="loader"></div>
            <div class="page2">
                salut
            </div>


        </div>

        <?php
        include "footer.php";
        ?>

    </div>

</body>
</html>
