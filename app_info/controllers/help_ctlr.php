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
    function sav_post(){
        $message = $_POST["msg"];
        $id_habitation=$_POST["maison"];
        $this->loadModel("Sav_Post");
        $this->Sav_Post->execute_sav($message,$id_habitation);
        
        

    }
    function msg_post(){
        $message = $_POST["msg"];
        $id_habitation=$_POST["maison"];
        $this->loadModel("Msg_Post");
        $this->Msg_Post->execute_msg($message,$id_habitation);
        
        

    }
}


?>


