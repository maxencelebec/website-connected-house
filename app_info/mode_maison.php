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
			    		Mode Economiseur
						<button id="myBtn">informations</button>

						<div id="myModal" class="modal">

					 	<div class="modal-content"> 
					  			<br>
					  			<br>
					  			Le mode économie d’énergie réduit la quantité d’énergie utilisée par votre domicile lorsque la consomation dépasse 70% 
					  			<br>
					  			Une fois ce mode activé, les actionneurs( lumière, chauffage,) dans les pieces sans présence seront éteints
							
						  		
					    	<span class="close">&times;</span>
					  	</div>

						</div>
			    			    	
    					<div class="boutton_onoff">
                         	    <?php
                            	$boutton = 2;
                            	include "boutton.php";
                            	?>
                            	<br>ON/OFF
						</div>
	    			</div>

			    	<div class="mon_mode" onclick="mon_mode()">
			    		Mon Mode
			    		<button id="myBtn">modifier</button>

						<div id="myModal" class="modal">

						<div class="modal-content">
							<span class="close">&times;</span>
						</div>

						</div>


			   		 	<div class="boutton_onoff">
                      		    <?php
                       		    $boutton = 2;
                       		    include "boutton.php";
                        		?>
                         		<br>ON/OFF
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
	
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>