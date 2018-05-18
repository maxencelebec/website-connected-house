<link rel="stylesheet" href="boutton.css"/>


<label class="switch">
    <input type="checkbox"
        <?php

            $connect = new PDO("mysql:host=localapp;dbname=virifocus","root", "");
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req = $connect->prepare("SELECT etat FROM capteurs WHERE id=? ");
            $req->execute(array(56));
            while ($donnees = $req->fetch())
            {
                $etat=$donnees['etat'];
                if($etat==0) {
                    echo "checked";
                }
                else{
                    echo "";
                }
            }

        ?>
    >


    <span class="slider"></span>
</label>