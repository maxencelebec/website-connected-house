<!DOCTYPE html>
<html>
<head>
    <title>Virifocus</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="dashboard_compte.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
	<?php

// Name of the file
$filename = 'users.sql';
// MySQL host
$mysql_host = 'localhost';
// MySQL username
$mysql_username = 'root';
// MySQL password
$mysql_password = '';
// Database name
$mysql_database = 'virifocus';

// Connect to MySQL server
mysql_connect($mysql_host, $mysql_username, $mysql_password) or die('Error connecting to MySQL server: ' . mysql_error());
// Select database
mysql_select_db($mysql_database) or die('Error selecting MySQL database: ' . mysql_error());

// Temporary variable, used to store current query
$templine = '';
// Read in entire file
$lines = file($filename);
// Loop through each line
foreach ($lines as $line)
{
// Skip it if it's a comment
if (substr($line, 0, 2) == '--' || $line == '')
    continue;

// Add this line to the current segment
$templine .= $line;
// If it has a semicolon at the end, it's the end of the query
if (substr(trim($line), -1, 1) == ';')
{
    // Perform the query
    mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
    // Reset temp variable to empty
    $templine = '';
}
}
 echo "Tables imported successfully";
?>
</head>
<body class="fond">
            <div id="site">
			
			<?php
				include "header.php";
			?>
			
				<!-- Boutons des tabs (tableau horizontal) -->
				<div class="tab">
				<button class="tablinks" id="tablink1">Profile</button>		<!-- Le bouton "Profile" est ouvert par défault (voir JS) -->
				<button class="tablinks" id="tablink2">Compte</button>
				<button class="tablinks" id="tablink3">Confidentialit&eacute;</button>
				<button class="tablinks" id="tablink4">Notifications</button>
				</div>
				
					<!-- Tab 1 : Profile -->
						<div id="profile" class="tabcontent">
							<form> 
								Name: <input type="text" name="name" value="<?php echo $name;?>">
								Firstname: <input type="text" name="firstname" value="<?php echo $firstname;?>">
							</form>
							<hr />
							<p> J'aimerai savoir comment faire une bonne pur&eacute;e. </p>
							<hr />
							<p> Quel est votre secret ? </p>
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