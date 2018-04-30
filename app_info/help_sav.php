<!DOCTYPE html>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="help_sav.css"/>
</head>


<body class="help_sav">

<header > 

<?php include "header.php";?>
</header>


<div class="containersav">
	 

	
	<img class="bebe" src="image/crying.svg">
	<div class="infobox">Ce sont des choses qui arrivent</br> et c'est pourquoi,</br>nous sommes là pour vous aider.</div> 
    <form>
     	
     	
        <label for="maison">Maison</label>
        <select id="maison" name="maison">
          <option value="Casa de Papel">Casa de Papel</option>
          <option value="Maison Blanche">Maison Blanche</option>
          <option value="Trouville en Seine">Trouville en Seine</option>
        </select>
        
        <label for="device">Type de matériel défectieux</label>
        <select id="device" name="device">
          <option value="Patrick">CeMac</option>
          <option value="Bob">Capteur</option>
          <option value="Patricia">Panne Généralisée</option>
        </select>
        
        <!-- Ici il faudra voir les capteur dispo et d�fectueux avec la BDD -->
        <label for="capteur">Capteur</label>
        <select id="capteur" name="capteur">
          <option value="Luminosité">Luminosité</option>
          <option value="Température">Température</option>
          <option value="Humidité">Humidité</option>
        </select>
        
        
        
        
        
        <label for="msg">Message</label>
        <textarea id="msg" name="msg" placeholder="Dites nous tout..." ></textarea>
        
        <input id="submit" type="submit" value="Envoyer">
        
    </form>
</div> 

<footer><?php include "footer.php";?></footer>

</body>


