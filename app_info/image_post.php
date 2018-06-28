<?php
session_start();
$target_dir = "image/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    try {
        $bdd = new PDO('mysql:host=localapp;dbname=virifocus;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    $id_habitation = $_SESSION['id_habitation'];
    $req = $bdd->prepare("UPDATE habitation SET image = '$target_file' WHERE (id= '$id_habitation')");
    $req->execute();
    $uploadOk = 1;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    ?>
    <p>
        Sorry, your file was not uploaded.<br>
        That's because of one of these reasons :<br><br>
            - It was too large (maximum size is 5 MB) ;<br>
            - It was not in one of these formats : JPG, JPEG, PNG or GIF.<br>
    </p>

    <a href="dashboard_maison.php"><button>Back to main menu</button></a>

    <?php


// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header("Location: dashboard_maison.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
