<?php
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
<<<<<<< HEAD
=======
    
>>>>>>> master
    /* ####### ECRITURE DES TRAMES DANS LA BDD ######## */
    /* Connection à la BDD */
    try {
        $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    for ($i = 0, $size_demi = round(count($data_tab) / 2); $i < $size_demi; $i ++) {
        
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
            $req = $bdd->prepare('SELECT COUNT(id) FROM trame_courante WHERE timestamp=?');
            $req->execute(array($timestamp));
            while($donnees = $req->fetch()) {
                $compteur = $donnees['COUNT(id)'];
            }
            if($compteur==0) {
                $req = $bdd->prepare('INSERT INTO trame_courante(type_trame, num_objet, type_req, type_capteur, num_capteur, valeur, tim, checksum, timestamp)
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
            }
        }
    }
?>