<?php

try
    {
        $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    //session_start();


$req = $bdd->prepare('SELECT id FROM users WHERE mail=?');
$req->execute(array($_SESSION["mail"]));
while ($donnees = $req->fetch())
{
	$id_user = $donnees['id'];
}

?>

<div class="container">
<div id="canvas-map"></div>

	<div class="infobox"></div>
    
    <form action="<?php echo WEBROOT?>index_mvc.php?p=help_ctlr/msg_post" method="post">
        
        <!-- Ici il faudra voir les maisons dispo avec la BDD -->
        <label for="maison">Maison</label>
        <select id="maison" name="maison">
          <option value="">Selectionner</option>
          <?php
          $req = $bdd->prepare('SELECT nom,id FROM habitation WHERE id_user=?');
        $req->execute(array($id_user));
        while ($donnees = $req->fetch())
                    {
						
            $nom_maison = $donnees['nom'];
            $id_habitation=$donnees['id'];
						?>
						<option value="<?php echo $id_habitation?>"><?php echo $nom_maison;?></option>
            
					<?php } ?>
        </select>
        
        <label for="msg">Message</label>
        <textarea id="msg" name="msg" placeholder="Dites nous tout..." ></textarea> 
        
        <input id="submit" type="submit" value="Envoyer">
        
    </form>
</div> 



