<?php 

class Message_Center extends Model{
	
	var $table = "message";

	/**
	 * entrez ici le type de message, 1 pour classique 2 pour sav
	 * Le second param est le nombre de message a afficher. 
	 */
	function get_msg($type_msg,$number_msg){
		try
        {
            $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
		$req = $bdd->prepare('SELECT id FROM users WHERE mail= ? ');
        $req->execute(array($_SESSION["mail"]));

        $id_user;
        while ($donnees = $req->fetch()) {
            $id_user = $donnees['id'];
        }

		if($type_msg==1){
			return $this->find(
			
			array(
			
			"order"=> "id ASC",
			"fields"=> "id,id_type_msg,Date_Heure,contenu_msg",
			"condition"=> "id_type_msg = '1'"

		)

			);
			

		}
		else if($type_msg==2){
			return $this->find(array(
				
				"order"=> "id ASC",
				"fields"=> "id,id_type_msg,Date_Heure,contenu_msg",
				"condition"=> "id_type_msg = '2'"
			
				)
			
			);

		}
		else if($type_msg==3){
			return $this->find(array(
				
				"order"=> "id ASC",
				"fields"=> "id,id_type_msg,Date_Heure,contenu_msg",
				"condition"=> "id_utilisateur='$id_user'"
			
				)
			
			);

		}

		
		
	}
}


?>