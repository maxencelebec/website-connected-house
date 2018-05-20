<link rel="stylesheet" href="boutton.css"/>

<label class="switch">
    <input type="checkbox" value="<?php echo $id_capteur; ?>"
        <?php

            $connect = new PDO("mysql:host=localapp;dbname=virifocus","root", "");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req = $connect->prepare("SELECT etat FROM capteurs WHERE id=? ");
            $req->execute(array($id_capteur));
            while ($donnees = $req->fetch())
            {
                $etat=$donnees['etat'];
                if($etat==0) {
                    echo "checked";
                }

            }

        ?>
    >


    <span class="slider"></span>
</label>

