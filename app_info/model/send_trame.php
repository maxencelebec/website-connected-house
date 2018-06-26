<?php

function send_trame($id_capteur, $etat, $type)
{
    $objet = substr($id_capteur, 0, 4);
    $num = substr($id_capteur, 5);
    /* Restriction sur le type d'actionneur qui peuvent envoyer des trames */
    /* Traduction du type en valeur numérique puis envoie de la trame */
    $type_id = type_translate($type);
    
    /* Récupération du timestamp */
    date_default_timezone_set('Europe/Paris');
    $time = date("YmdHis");
    
    /* Ecriture de la trame */
    $trame = "1" . $objet . "2" . $type . $num . "000" . $etat . "0LEC50" . $time;
    
    /* Envoie de la trame vers le serveur */
    $url = 'projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009D&TRAME=' . $trame;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);
    curl_close($ch);
}

function type_translate($type)
{
    $connect = new PDO("mysql:host=localapp;dbname=virifocus", "root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $connect->prepare("SELECT id FROM type_capteur WHERE type='$type' ");
    $req->execute();
    while ($donnees = $req->fetch()) {
        $id_type = $donnees['id'];
    }
    return "$id_type";
}

?>