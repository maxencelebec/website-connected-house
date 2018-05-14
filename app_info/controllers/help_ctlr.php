<?php
class help_ctlr extends Controller{
    
    function index_mvc() {
        
        $d=array();
        $d['test']=array('titre'=> 'salut');
        $this->set($d);
        $this->render('index');
        
    }
    
    function help_sav($id_utilisateur,$id_habitation) {
        ;
    }
    
    
}


?>


