<?php 

function send_trame($id_capteur, $etat, $type) {
    
    /* Récupération du timestamp */
    date_default_timezone_set('Europe/Paris');
    $time = date("YmdHis");
    
    /* Ecriture de la trame */
    $trame = "1009D2".$type.$id_capteur.'000'.$etat."0LEC5d".$time;
    echo $id_capteur;
    
    /* Envoie de la trame vers le serveur */
    $url = 'projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=009D&TRAME='.$trame;
    echo $url;
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_exec($ch);
    curl_close($ch);
    
}

function type_translate($type) {
    if($type=="presence") {
        return "1";
    }
    elseif($type=="temperature") {
        return "3";
    }
    elseif($type=="luminosite") {
        return "5";
    }
}

?>