	<link rel="stylesheet" href="header.css"/>

    <div class="header">
        <div class="home">
            <?php
            if($_SESSION['type']==1){
                ?><a class="lien" href="dashboard_administrateur.php" ><?php
            }
            else if($_SESSION['type']==2) {
                 ?><a class="lien" href="dashboard_simple.php" ><?php
            }
            else if($_SESSION['type']==3) {
                 ?><a class="lien" href="dashboard_technicien.php" ><?php
            }
            ?>
                <div class="home_lien"><br><br>Home</div></a></div>
        <div class="compte">
            <?php
            if($_SESSION['type']==1){
                ?><a class="lien" href="dashboard_administrateur.php" ><?php
            }
            else if($_SESSION['type']==2) {
                ?><a class="lien" href="compte.php" ><?php
            }
            else if($_SESSION['type']==3) {
                    ?><a class="lien" href="compte.php" ><?php
            }
            ?>
                 <div class="compte_lien"><br><br>Compte</div></a></div>
        <div class="parametres">
            <?php
            if($_SESSION['type']==1){
                ?><a class="lien" href="parametres_administrateur.php" ><?php
            }
            else if($_SESSION['type']==2) {
                ?><a class="lien" href="parametres.php" ><?php
            }
            else if($_SESSION['type']==3) {
                    ?><a class="lien" href="parametres.php" ><?php
            }
            ?>
                <div class="parametres_lien"><br><br>Paramètres</div></a></div>
        <div class="aide">
            <?php
            if($_SESSION['type']==1){
                ?><a class="lien" href="dashboard_administrateur.php" ><?php
            }
            else if($_SESSION['type']==2) {
                ?><a class="lien" href="index_mvc.php?p=help_ctlr" ><?php
            }
            else if($_SESSION['type']==3) {
                ?><a class="lien" href="dashboard_technicien.php" ><?php
            }
            ?>
                   <div class="aide_lien"><br><br>Aide</div></a></div>
        <div class="virifocus"></div>
    </div>
