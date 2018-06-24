<link rel="stylesheet" href="boutton.css"/>

<?php
if ($boutton==1) {
    ?>

    <label class="switch">
        <input type="checkbox" value="<?php echo $type_capteur; ?> "
            <?php

            $connect = new PDO("mysql:host=localapp;dbname=virifocus", "root", "");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req = $connect->prepare("SELECT etat FROM capteurs WHERE type= 'temperature' ");
            $req->execute(array($type_capteur));
            while ($donnees = $req->fetch()) {
                $etat = $donnees['etat'];
                if ($etat == 0) {
                    echo "checked";
                }

            }

            ?>
        >


        <span class="slider"></span>
    </label>

    <?php
}
elseif ($boutton==2){
    ?>
    <label class="switch">
        <input type="checkbox">
        <span class="slider"></span>
    </label>
    <?php
}