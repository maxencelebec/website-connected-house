<?php

include 'model/send_trame.php';

try
{
    $connect = new PDO("mysql:host=localapp;dbname=virifocus","root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $connect->prepare("SELECT etat, type, valeur, id_capteur FROM capteurs WHERE id=? ");
    $req->execute(array($_POST['id_capteur']));
    while ($donnees = $req->fetch()) {
        $etat = $donnees['etat'];
        $type = $donnees['type'];
        $id_capteur = $donnees['id_capteur'];
        if ($etat==0) {
            $statement = $connect->prepare("UPDATE capteurs set etat=? WHERE id=? ");
            $statement->execute(array(1, $_POST['id_capteur']));
            $objet = substr($id_capteur, 0, 4);
            $num = substr($id_capteur, 5);
            
            /* Traduction du type en valeur numérique puis envoie de la trame */
            $type = type_translate($type);
           
            /* Récupération du timestamp */
            date_default_timezone_set('Europe/Paris');
            $time = date("YmdHis");
            
            /* Ecriture de la trame */
            $trame = "1".$objet."2".$type.$num."00010LEC50".$time;

            /* Envoie de la trame vers le serveur */
            $url = 'projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009D&TRAME='.$trame;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_exec($ch);
            curl_close($ch);
        } else {
            $statement = $connect->prepare("UPDATE capteurs set etat=? WHERE id=?");
            $statement->execute(array(0, $_POST['id_capteur']));
            
            $objet = substr($id_capteur, 0, 4);
            $num = substr($id_capteur, 5);
            
            /* Traduction du type en valeur numérique puis envoie de la trame */
            $type = type_translate($type);
           
            /* Récupération du timestamp */
            date_default_timezone_set('Europe/Paris');
            $time = date("YmdHis");
            
            /* Ecriture de la trame */
            $trame = "1".$objet."2".$type.$num."00000LEC50".$time;

            /* Envoie de la trame vers le serveur */
            $url = 'projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009D&TRAME='.$trame;
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_exec($ch);
            curl_close($ch);
        }
    }


}
catch(PDOException $error)
{
    echo $error->getMessage();
}
?>