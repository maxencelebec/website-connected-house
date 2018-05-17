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
			    	<div class="eco_mode"onclick="mode_eco()">
			    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mode Economiseur
				    	<div class="overlay">
	    					<div class="text">Le mode économie d’énergie réduit la quantité d’énergie utilisé en etteingnant les capteurs suivants (1,2,3...)</div>
	    				</div>
	    			</div>
			    	<div class="mon_mode" onclick="mon_moyen()">
			    		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mon Mode
				    	<div class="overlay">
	    					<div class="text">&nbsp;&nbsp;&nbsp;les capteurs que vous allez sélectionner seront éteind automatiquement quand ce mode est activé </div>
	    				</div>
			    	</div>
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