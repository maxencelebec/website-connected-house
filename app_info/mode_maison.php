<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Virifocus</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="mode_maison.css" />
<link rel="icon" type="image/png" href="image/logo.png" />
<script src="jQuery.js"></script>

</head>
<body class="fond">
	<div id="site">
                
        <?php
        include "header.php";
        ?>

        <?php
        $_SESSION['id_habitation'] = $_GET['id'];
        $id_habitation = $_SESSION['id_habitation'];
        ?>
        	<div class="main1">
					<div id="eco_mode" onclick="mode_eco()">Eco</div>
					<div id="moyen_mode" onclick="mode_moyen()">Moyen</div>
					<div id="max_mode" onclick="mode_max()">Max</div>
				</div>
	</div>

	<?php
        include "footer.php";
    ?>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="choix_piece.js"></script>

</body>