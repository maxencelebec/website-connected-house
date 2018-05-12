<?php
require "core.php";
//$Virifocus = Model::load("virifocus");
$messag= Model::load("Message");

/*
?>


<?php 
if(!empty($_POST)){
    $messag->save($_POST);
}
?>


<form method="post" action="index_mvc.php"> 


<?php $id=$_GET["id"]; 
$messag->id=$id;
echo $messag->read();?>
<input type="hidden" name="id" value="<?php echo $messag->contenu_msg;?>">
<input type="text" name="name" value="<?php echo $messag->id;?>">
<input type="submit" value="send">

</form>

*/

?>
<?php 
$message =$messag->find(array("order"=> " contenu_msg ASC"));
print_r($message);
?>



