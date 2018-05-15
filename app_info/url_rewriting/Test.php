<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Test PHP</title>
    <link rel="stylesheet" href="test.css"/>
</head>


<body>
    
	<?php
	    $age = 18;
		if ($age>17) {
			echo "bonjour";
		}
		else {
			echo "au revoir";
		}
	?>
	                           </br>
	<?php
		for ($nbLigne=1 ; $nbLigne<=5 ; $nbLigne++) {
			echo 'ceci est la ligne' . $nbLigne;
	?>
			</br>
	<?php
		}
	?>
	                           </br>
	<?php
	    $prenom = array ('Paul' , 'Michel' , 'Djims');
		for ($i=0 ; $i<=2 ; $i++) {
			echo $prenom[$i];
	?>
	        </br>
	<?php
	    }
	?>
		                           </br>
    <?php
	    if (in_array('Paul',$prenom)) {
			echo 'Paul est dans la liste';
		}
		
		if (in_array('Trouduc',$prenom)) {
			echo 'Trouduc est dans la liste';
		}
	?>
	                           </br>
	<?php
	    function direBonjour($liste) {
			for ($j=0 ; $j<=2 ; $j++) {
			    echo 'Bonjour ' .  $liste[$j] . '</br>';
			}
		}
		
		direBonjour($prenom);
		$nom = array('trouduc' , 'ducon' , 'tete de gland');
		direBonjour($nom);
		
		function volumeCone ($R,$H) {
			$V = 3.1415*$R*$R*$H*(1/3);
			echo 'Le volume du cone est ' . $V . 'm^3';
		}
		
		volumeCone(4,5);
	?>
</body>



















</html>