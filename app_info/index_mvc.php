<?php
define("WEBROOT",str_replace('index_mvc.php',"",$_SERVER['SCRIPT_NAME']));
define("ROOT",str_replace('index_mvc.php',"",$_SERVER['SCRIPT_FILENAME']));

require(ROOT.'core/core.php');
require(ROOT.'core/model.php');
require(ROOT.'core/controller.php');

$params=explode('/',$_GET['p']);


$controller=$params[0]; // ceci conrrespond au premier élément dans les liens /help/
$action=isset($params[1]) ? $params[1]:'index_mvc'; //ceci conrrespond au second élément dans les liens /help/action par exemple help.php

require('/controllers/'.$controller.'.php');
$controller= new $controller();

if(method_exists($controller,$action)){
    unset($params[0]);unset($params[1]);
    call_user_func_array(array($controller,$action),$params);
    
    
    
    //$controller->$action();
    
}
else{
    echo'Erreur 404: not found';
}




/*
 * 
 * 
 * 
 * require "core.php";
//$Virifocus = Model::load("virifocus");
$messag= Model::load("Message");


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



?>
<?php 
$message =$messag->find(array("order"=> " contenu_msg ASC"));
print_r($message);
*/
?>



