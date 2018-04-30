<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="dashboard_compte.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
</head>
<body class="fond">
            <div id="site">
			
			<?php
				include "header.php";
			?>
			
				<!-- Boutons des tabs (tableau gauche) -->
				<div class="tab">
				<button class="tablinks" id="tablink1">Profile</button>		<!-- Le bouton "Profile" est ouvert par défault-->
				<button class="tablinks" id="tablink2">Compte</button>
				<button class="tablinks" id="tablink3">Confidentialit&eacute;</button>
				<button class="tablinks" id="tablink4">Notifications</button>
				</div>
				
					<!-- Tab 1 : Profile -->
						<div id="profile" class="tabcontent">
							Salut !
							<br> J'aimerai savoir comment faire une bonne pur&eacute;e. </br>
							<br> Quel est votre secret ? </br>
						</div>			
						
					<!-- Tab 2 : Compte -->
						<div id="compte" class="tabcontent"> Test2 </div>		
						
					<!-- Tab 3 : Confidentialité -->
						<div id="confidentialite" class="tabcontent"> Test3 </div>		
						
					<!-- Tab 4 : Notifications -->
						<div id="notifications" class="tabcontent"> Test4 </div>
			
			<?php
				include "footer.php";
			?>
			
            </div>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="dashboard_compte.js"></script>
</body>
</html>