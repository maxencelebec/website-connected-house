<?php 
/* Connection à la BDD */
try
{
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
    echo "Connecté à la BDD <br /> <br />";
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
    echo "ERREUR BDD ERREUR BDD ERREUR BDD";
}

/* Requête: SELECT num_capteur, valeur WHERE plus récent PAR num_capteur */
$req = $bdd->prepare('SELECT num_capteur, valeur, timestamp FROM trame_courante AS t1
                         WHERE timestamp = (SELECT MAX(timestamp) FROM trame_courante AS t2 WHERE t1.num_capteur = t2.num_capteur) GROUP BY num_capteur');
$req->execute();
    
    
while($recup = $req->fetch()) {
    $num_capteur_tab[] = $recup['num_capteur'];
    $valeur_tab[] = $recup['valeur'];        
    $timestamp_tab[] = $recup['timestamp'];
    }
    
/* Vérification du contenu des tabs avant echo */
if($num_capteur_tab==null) {
    echo "La BDD est vide!";
}
else {
    for($i=0, $size=count($num_capteur_tab); $i<$size; $i++) {
    echo "Capteur $num_capteur_tab[$i] de valeur $valeur_tab[$i] à $timestamp_tab[$i] <br />";
    }
}
?>