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
        $num = $donnees['id_capteur'];
        if ($etat==0) {
            $statement = $connect->prepare("UPDATE capteurs set etat=? WHERE id=? ");
            $statement->execute(array(1, $_POST['id_capteur']));
            /* Traduction du type en valeur numérique puis envoie de la trame */
            $type = type_translate($type);
            send_trame($num, 0, $type);
        } else {
            $statement = $connect->prepare("UPDATE capteurs set etat=? WHERE id=?");
            $statement->execute(array(0, $_POST['id_capteur']));
            /* Traduction du type en valeur numérique puis envoie de la trame */
            $type = type_translate($type);
            send_trame($num, 1, $type);
        }
    }


}
catch(PDOException $error)
{
    echo $error->getMessage();
}
?>