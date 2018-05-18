<?php
class help_ctlr extends Controller{
    
    function index_mvc() {
        
        $this->render('index');
        
    }
    /**
     * Test de recommandation pour la fonction
     */
    function sav() { 
        $this->render('sav');
        
    }
    function message(){
        $this->render('message');
    }
    
    function faq() {
    	$this->render('faq');
    }

    function message_center(){
        $this->loadModel("Message_Center");
        $d["d"]= $this->Message_Center->get_msg(3,"4");
     
        $this->set($d);

        $this->render('message_center');

    }
}


?>


