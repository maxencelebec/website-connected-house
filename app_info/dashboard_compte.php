<!DOCTYPE html>
<html>
<head>
    <title>Virifocus | Compte</title>
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
				<button class="tablinks" onclick="openTab(event,'profile')">Profile</button>		<!-- Le bouton "Profile" est ouvert par défault-->
				<button class="tablinks" onclick="openTab(event,'compte')">Compte</button>
				<button class="tablinks" onclick="openTab(event,'confidentialite')">Confidentialit&eacute;</button>
				<button class="tablinks" onclick="openTab(event,'notifications')">Notifications</button>
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
</body>
<script src="dashboard_compte.js"></script>
</html>