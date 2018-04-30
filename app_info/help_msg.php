<!DOCTYPE html>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="help_msg.css"/>
</head>


<body class="help_msgs">



<?php include "header.php";?>



<div class="container">
	 

	<div class="infobox"></div>
    <form>
    
        <!-- Ici il faudra voir les utilisateur dispo avec la BDD -->
        <label for="Utilisateur">Utilisateur</label>
        <select id="utilisateur" name="Utilisateur">
          <option value="Patrick">Patrick</option>
          <option value="Bob">Bob</option>
          <option value="Patricia">Patricia</option>
        </select>
        
        <!-- Ici il faudra voir les maisons dispo avec la BDD -->
        <label for="maison">Maison</label>
        <select id="maison" name="maison">
          <option value="Casa de Papel">Casa de Papel</option>
          <option value="Maison Blanche">Maison Blanche</option>
          <option value="Trouville en Seine">Trouville en Seine</option>
        </select>
        
        <label for="msg">Message</label>
        <textarea id="msg" name="msg" placeholder="Dites nous tout..." ></textarea>
        
        <input id="submit" type="submit" value="Envoyer">
        
    </form>
</div> 

<?php 
include "footer.php"
?>

</body>


