<?php
session_start();
?>
<html>

<head>
<title>Virifocus</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="mode_maison.css" />
<link rel="icon" type="image/png" href="image/logo.png" />

</head>
<body class=mode_maison>
	<div id="site">
	    <?php
	        include "header.php";
	    ?>

		<div class="content">

		    <div class="main1">
			    <div class="title"><h1>MODE MAISON</h1></div>

			    <div class="mode">
			    	<div class="eco_mode"onclick="mode_eco()">Eco</div>
			    	<div class="moyen_mode" onclick="mode_moyen()">Moyen</div>
					<div class="max_mode" onclick="mode_max()">Max</div>
			    </div>
			    <div class="comment"></div>
			</div>
		</div>

		<?php
	        include "footer.php";
	    ?>
	</div>
</body>
</html>