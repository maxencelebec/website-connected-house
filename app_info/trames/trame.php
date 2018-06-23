<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" /> 
    <link rel="stylesheet" href="#"/>
    <title>traitement trame</title>
</head>
<body>        
	<form method="post" action="">    
    	<input type="submit" name="BDD" value="Méthode 1">
    	<input type="submit" name="test" value="Méthode 2">
    	<input type="submit" name="actu" value="Actualiser BDD">
    	<input type="submit" name="init" value="Session à 0">
    </form>
</body>
</html>

<?php 
session_start();

/* Connection à la BDD */
try {
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if(isset($_POST['BDD'])) {
    $starttime = microtime(true);
    
    $req = $bdd->prepare('SELECT DISTINCT num_capteur FROM logs');
    $req->execute();
    
    while($data = $req->fetch()) {
        $tmp[] = $data['num_capteur'];
    }
    
    foreach($tmp as $c) {
        $req = $bdd->prepare('SELECT id, num_capteur, valeur, timestamp FROM logs WHERE num_capteur=?
                          ORDER BY timestamp DESC LIMIT 1');
        $req->execute(array($c));
        
        while($recup = $req->fetch()) {
            $id[] = $recup['id'];
            $num_capteur[] = $recup['num_capteur'];
            $valeur[] = $recup['valeur'];
            $timestamp[] = $recup['timestamp'];
        }
    }
    
    echo "Méthode 1: <br />";
    for($j=0, $size=count($num_capteur); $j<$size; $j++) {
        echo "$id[$j] <br />";
        echo "$num_capteur[$j] <br />";
        echo "$valeur[$j] <br />";
        echo "$timestamp[$j] <br /><br />";
    }
    $endtime = microtime(true);
    
    $duration = $endtime - $starttime;
    echo "Temps d'exécution: $duration secondes";
}
if(isset($_POST['test'])) {
    $starttime = microtime(true);
    $req = $bdd->prepare('SELECT id, num_capteur, valeur, timestamp FROM logs AS t1
                         WHERE timestamp = (SELECT MAX(timestamp) FROM logs AS t2 WHERE t1.num_capteur = t2.num_capteur) GROUP BY num_capteur');
    $req->execute();
    while($recup = $req->fetch()) {
        $id[] = $recup['id'];
        $num_capteur[] = $recup['num_capteur'];
        $valeur[] = $recup['valeur'];
        $timestamp[] = $recup['timestamp'];
    }
    echo "Méthode 2: <br />";
    for($i=0, $size=count($num_capteur); $i<$size; $i++) {
        echo "$id[$i] <br />";
        echo "$num_capteur[$i] <br />";
        echo "$valeur[$i] <br />";
        echo "$timestamp[$i] <br /><br />";
    }
    $endtime = microtime(true);
    
    $duration = $endtime - $starttime;
    echo "Temps d'exécution: $duration secondes";
}
if(isset($_POST['actu'])) {
    $starttime = microtime(true);
    
    /* Récupération des données sur le site fourni */
    $url = 'projets-tomcat:8080/appService?ACTION=GETLOG&TEAM=009D';
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $data = curl_exec($ch);
    curl_close($ch);
    
    /* Stockage des trames dans un array */
    $data_tab = preg_split("/([0-9]009D)/", $data, - 1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
    
    /* ####### ECRITURE DES TRAMES DANS LA BDD ######## */
    for ($i = $_SESSION['last_size'], $size_demi = round(count($data_tab) / 2); $i < $size_demi; $i ++) {
        
        /* Récupération de la trame dans data_tab */
        $j = 2 * $i;
        $k = 2 * $i + 1;
        $trame = "$data_tab[$j]$data_tab[$k]";
        
        /* Récupération du type de la trame */
        $type_trame = substr($trame, 0, 1);
        
        /* Gestion des trames selon leur type, vérifie notamment la cohérence avec la longueur de la trame */
        
        /* Trame courante (33) */
        if (($type_trame == 1) && (strlen($trame) == 33)) {
            $num_objet = substr($trame, 1, 4);
            $type_req = substr($trame, 5, 1);
            $type_capteur = substr($trame, 6, 1);
            $num_capteur = substr($trame, 7, 2);
            $valeur = substr($trame, 9, 4);
            $tim = substr($trame, 13, 4);
            $checksum = substr($trame, 17, 2);
            $timestamp = substr($trame, 19);
            
            /* Envoie dans la BDD si la trame n'est déjà pas existante*/
            $req = $bdd->prepare('SELECT COUNT(id) FROM logs WHERE timestamp=?');
            $req->execute(array($timestamp));
            while($donnees = $req->fetch()) {
                $compteur = $donnees['COUNT(id)'];
            }
            if($compteur==0) {
                $req = $bdd->prepare('INSERT INTO logs(type_trame, num_objet, type_req, type_capteur, num_capteur, valeur, tim, checksum, timestamp)
                                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $req->execute(array(
                    $type_trame,
                    $num_objet,
                    $type_req,
                    $type_capteur,
                    $num_capteur,
                    $valeur,
                    $tim,
                    $checksum,
                    $timestamp
                ));
                var_dump($req);
            }
        }
    }
    $total = $size_demi - $_SESSION['last_size'];
    $_SESSION['last_size'] = $size_demi;
    $endtime = microtime(true);
    $duration = $endtime - $starttime;
    echo "Temps d'exécution: $duration secondes pour $total trames <br />";
    echo "Success!";
}
if(isset($_POST['init'])) {
    $_SESSION['last_size'] = 0;
}
?>  