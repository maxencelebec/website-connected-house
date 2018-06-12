<?php
/*
$count=rand();
echo $count;
*/
try {
    $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('SELECT contenu_msg, id_utilisateur  FROM message WHERE id=?');
$req->execute(array($_POST['id']));
while ($donnees = $req->fetch()) { ?>
    <script>
    document.getElementById('contenu').innerText="<?= $donnees['contenu_msg']; ?>";
    </script>
<?php
}
?>