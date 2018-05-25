<?php
/*$_SESSION['salut']=$salut;*/
/* Connection à la BDD */
try
{
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
    //echo "Connecté à la BDD";
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
    //echo "ERREUR BDD ERREUR BDD ERREUR BDD";
}

/* Récupération des données sur le site fourni */
$url = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=009D";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
$file_size = curl_getinfo($ch, CURLINFO_SIZE_DOWNLOAD);
curl_close($ch);

/* Emondé un peu la BDD */
date_default_timezone_set('Europe/Paris');
$time = date("YmdHis");
$time = $time - 500;

$req = $bdd->prepare('DELETE FROM trame_courante WHERE timestamp<?');
$req->execute(array($time));
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" /> 
    <link rel="stylesheet" href="#"/>
    <title>traitement trame</title>
</head>
<body>        
	<form method="post" action="">    
    	<input type="submit" name="BDD" value="Server->BDD">
    	<input type="submit" name="test" value="BDD->Server">
    </form>
</body>
</html>

<?php 
/* Stockage des trames dans un array */
$data_tab = preg_split("/([0-9]009D)/", $data, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);

if(isset($_POST['BDD'])) {
    for($i=0, $size_demi=round(count($data_tab)/2); $i<$size_demi; $i++) {
        
        /* Récupération de la trame dans data_tab */
        $j = 2 * $i;
        $k = 2 * $i+1;
        $trame = "$data_tab[$j]$data_tab[$k]";
        //echo "$trame <br />";
        
        /* Récupération du type de la trame */
        $type_trame = substr($trame, 0, 1);
        
        /* Gestion des trames selon leur type, vérifie notamment la cohérence avec la longueur de la trame */
        
        /* Trame courante (33) */
        if(($type_trame==1)&&(strlen($trame)==33)) {   
            $num_objet = substr($trame, 1, 4);
            $type_req = substr($trame, 5, 1);
            $type_capteur = substr($trame, 6, 1);
            $num_capteur = substr($trame, 7, 2);
            $valeur = substr($trame, 9, 4);
            $tim = substr($trame, 13, 4);
            $checksum = substr($trame, 17, 2);
            $timestamp = substr($trame, 19);

            //echo "Décomposition: $type_trame|$num_objet|$type_req|$type_capteur|$num_capteur|$valeur|$tim|$checksum|$timestamp <br /><br />";
            
            /* Envoie dans la BDD */
            $req = $bdd->prepare('INSERT INTO trame_courante(type_trame, num_objet, type_req, type_capteur, num_capteur, valeur, tim, checksum, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $req->execute(array($type_trame, $num_objet, $type_req, $type_capteur, $num_capteur, $valeur, $tim, $checksum, $timestamp));
        }
        elseif(($type_trame==1)&&(strlen($trame)!=33))  {
            //echo "Erreur longueur de la trame courante <br /><br />";
        }
        
        /* Trame rapide (25) */
        elseif(($type_trame==3)&&(strlen($trame)==25)) {
            $num_objet = substr($trame, 1, 4);
            $type_req = substr($trame, 5, 1);
            $type_capteur = substr($trame, 6, 1);
            $nbr = substr($trame, 7, 1);
            $donnees = substr($trame, 8, 1);
            $checksum = substr($trame, 9, 2);
            $timestamp = substr($trame, 11);
            
            //echo "Décomposition: $type_trame|$num_objet|$type_req|$type_capteur|$nbr|$donnees|$checksum|$timestamp <br /><br />";
            
            /*Envoie dans la BDD*/
            $req = $bdd->prepare('INSERT INTO trame_rapide(type_trame, num_objet, type_req, type_capteur, nbr, donnees, checksum, timestamp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $req->execute(array($type_trame, $num_objet, $type_req, $type_capteur, $nbr, $donnees, $checksum, $timestamp));    
        }
        elseif(($type_trame==3)&&(strlen($trame)!=25)) {
            //echo "Erreur longueur de la trame rapide <br /><br />";
        }
    }        
}
if(isset($_POST['test'])) {
    $req = $bdd->prepare('SELECT type_trame, num_objet, type_req, type_capteur, num_capteur, valeur, tim, checksum, timestamp FROM trame_courante AS t1
                         WHERE timestamp = (SELECT MAX(timestamp) FROM trame_courante AS t2 WHERE t1.num_capteur = t2.num_capteur) GROUP BY num_capteur');
    $req->execute();
    while($recup = $req->fetch()) {
        $trame = $recup['type_trame'];
        $trame .= $recup['num_objet'];
        $trame .= $recup['type_capteur'];
        $trame .= $recup['num_capteur'];
        $trame .= $recup['valeur'];
        $trame .= $recup['tim'];
        $trame .= $recup['checksum'];
        $trame .= $recup['timestamp'];
        $new[] = $trame;
    }
    for($i=0, $size=count($new); $i<$size; $i++) {
        //echo "$new[$i] <br />";
    }
}
?>  