<!DOCTYPE html>

<html>
<head>
    <title> Virifocus </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="help.css"/>
    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>

</head>

<body class="fond">


	<?php 
    include "header.php"; 
    ?>


	<div class="main_help">
		<div class="option_help">

		<div class="titre_help"><h1>Votre espace aide</h1></div>
			
		<div class="option1"><a class="lien" href="help_faq.php">
            <img class="option_image" src="image/FAQ.svg"></a></div>
        <div class="option2"><a class="lien" href="help_msg.php">
            <img class="option_image" src="image/message.png"></a></div>
        <div class="option3"><a class="lien" href="help_sav.html">
            <img class="option_image" src="image/SAV.png"></a></div>

            <div class="option1_text"><a class="lien" href="help_faq.php">Foire aux questions</a></div>
            <div class="option2_text"><a class="lien" href="help_msg.php">Envoyer un message</a></div>
            <div class="option3_text"><a class="lien" href="help_sav.php">Signaler un problème <br/> technique</a></div>
		
		</div>
	</div>



	<?php 
	include "footer.php" 
	?>

</body>