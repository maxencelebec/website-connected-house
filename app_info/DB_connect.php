<?php

try
{
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'appg9d', 'virifocus'),
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

catch (Exception $e)
{
    die('Erreur :' .$e->getMessage());
}
?>
