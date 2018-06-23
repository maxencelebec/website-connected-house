<?php
//session_start();

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



	<div class="imgbox1">
		<img class="bebe" src="image/crying.svg">
		<div class="infobox">
			Ce sont des choses qui arrivent </br> et c'est pourquoi,</br>nous
			sommes là pour vous aider.
		</div>

	</div>
	<div class="containersav">

		<form id="ticketsav" action="<?php echo WEBROOT;?>index_mvc.php?p=help_ctlr/sav_post" method="post">


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
        
       
			<label for="device">Type de matériel défectieux</label> <select
				id="device" name="device">
				<option value="">Sélectionner...</option>
				<option value="cemac">CeMac</option>
				<option value="capteur">Capteur</option>
				<option id="pannegene" value="pannegene">Panne Généralisée</option>
				
                
                
                
			</select>
			
			<!-- Ici il faudra voir les capteur dispo et défectueux avec la BDD -->
			<label for="capteur">Capteur</label> <select id="capteur"
				name="capteur">
				<option value="">Sélectionner...</option>
          <?php
		$res = mysqli_query($link, "select * from capteurs WHERE id_habitation=$id_habitation");
		
		$req = $bdd->prepare('SELECT nom FROM capteurs WHERE id_user=?');
        $req->execute(array($id_user));
        while ($donnees = $req->fetch())
                    {
						
						$nom_capteur = $donnees['nom'];
						?>
						<option><?php echo $nom_capteur;?></option>
            
					<?php } ?>
     
        
   
        
          
				
			</select> <label for="msg">Message</label>
			<textarea id="msg" name="msg" placeholder="Dites nous tout..."></textarea>

			<input id="submit" type="submit" value="Envoyer">


		</form>
	</div>

	




