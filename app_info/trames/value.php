<?php 
/* Connection BDD */
$connect = new PDO("mysql:host=localapp;dbname=virifocus","root", "");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id_capteur = "01";
$capteur_actionneur = "temperature";

$req = $connect->prepare('SELECT num_capteur, valeur, timestamp FROM trame_courante WHERE num_capteur=?
                          ORDER BY timestamp DESC LIMIT 1');
$req->execute(array($id_capteur));
            
while($recup = $req->fetch()) {
    $valeur = $recup['valeur'];
    $timestamp = $recup['timestamp'];
    $num_capteur = $recup['num_capteur'];

    $req = $connect->prepare("SELECT etat, valeur, id_capteur FROM capteurs WHERE id_capteur=? ");
    $req->execute(array($id_capteur));
        while ($donnees = $req->fetch()) {
            $etat = $donnees['etat'];
            if ($etat == 1 && $capteur_actionneur == "temperature" && $num_capteur==$donnees['id_capteur']) {
                $update = $connect->prepare("UPDATE capteurs set valeur=$valeur WHERE id_capteur=?");
                $update->execute(array($num_capteur));
                echo $donnees['valeur']."°C";
            }
        }
}
?>