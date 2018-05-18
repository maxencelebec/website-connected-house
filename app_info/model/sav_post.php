
<?php session_start();?>
<?php class sav_post extends Model{


function execute_sav($message){
// Connexion à la base de données
	
	try
	{
	    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}
	
	$req = $bdd->prepare('SELECT id FROM users WHERE mail= ? ');
	$req->execute(array($_SESSION["mail"]));
	
	$id_user;
	while ($donnees = $req->fetch())
	{
	    $id_user=$donnees['id'];
	}
	
	$req = $bdd->prepare('SELECT id FROM habitation WHERE id_user= ? ');
	$req->execute(array($id_user));
	
	$id_habitation;
	while ($donnees = $req->fetch())
	{
	    $id_habitation=$donnees['id'];
	}
	
	$id_type_message = 1;
	
	
	
	$req = $bdd->prepare('INSERT INTO message (id_type_msg,contenu_msg, id_utilisateur, id_habitation) VALUES (?, ?, ?, ?)');
	$req->execute(array($id_type_message,$message,$id_user,$id_habitation));
	
}
	
	
	
	// Redirection vers la page suivante
	//header('Location:../index_mvc.php?p=help_ctlr');
	

 }?>