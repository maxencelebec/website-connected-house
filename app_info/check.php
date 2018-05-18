<?php


try
{
    $connect = new PDO("mysql:host=localapp;dbname=virifocus","root", "");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $connect->query("SELECT etat FROM capteurs");
    while ($donnees = $req->fetch()) {
        $etat = $donnees['etat'];
        if( $etat == 0){
            $statement = $connect->prepare("UPDATE capteurs set etat= ? ");
            $statement->execute(array( 1 ));
        }
        else {
            $statement = $connect->prepare("UPDATE capteurs set etat= ? ");
            $statement->execute(array( 0 ));
        }
    }

}
catch(PDOException $error)
{
    echo $error->getMessage();
}
?>