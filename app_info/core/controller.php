<?php 

class Controller{
    
    
    var $vars_set=array();
    var $layout='default';
    
    function set($d){
        $this->vars_set=array_merge($this->vars_set,$d);
    }
    
    
    
    function render($filename){
        extract($this->vars_set);
        ob_start();
        require(ROOT.'views/'.get_class($this).'/'.$filename.'.php'); // ceci est pour aoir la bonne vue get_class récupère le nom de la class courante
        $content_for_layout=ob_get_clean();
        if($this->layout==false){
            echo $content_for_layout;
        }else{
            require(ROOT.'views/layout/'.$this->layout.'.php');
        }
        
        
    
    }
    
   
    
}

?>