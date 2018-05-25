<html>
<head>
    <title>Virifocus</title>
    <meta charset="utf-8" />

    <link rel="icon" type="image/png" href="image/logo.png" />
    <script src="jQuery.js"></script>
    <link rel="stylesheet" href="<?php echo($css_for_layout);?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
</head>
<div id="site">
    <?php include "header.php"?>
    <?php echo $content_for_layout;?>
    <?php include "footer.php"?>
</div>
</html>