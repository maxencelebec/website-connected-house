<?php


try
{
    $connect = new PDO("mysql:host=localapp;dbname=virifocus","root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $connect->prepare("SELECT etat,type, valeur FROM capteurs WHERE id=? ");
    $req->execute(array($_POST['id_capteur']));
    while ($donnees = $req->fetch()) {
        $etat = $donnees['etat'];
        $type = $donnees['type'];
        if ($etat == 0) {
            $statement = $connect->prepare("UPDATE capteurs set etat=? WHERE id=? ");
            $statement->execute(array(1, $_POST['id_capteur']));
        } else {
            $statement = $connect->prepare("UPDATE capteurs set etat=? WHERE id=?");
            $statement->execute(array(0, $_POST['id_capteur']));
        }
    }


}
catch(PDOException $error)
{
    echo $error->getMessage();
}
?>