<?php
class help_ctlr extends Controller{
    
    function index_mvc() {
        
        $d=array();
        $d['test']=array('titre'=> 'salut');
        $this->set($d);
        $this->render('index');
        
    }
    
    function sav() {
        $this->render('sav');
        
    }
    function message(){
        $this->render('message');
    }
    
    
}


?>


