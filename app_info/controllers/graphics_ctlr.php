<?php

class graphics_ctlr extends Controller{

    function index_mvc() {

        $this->render('index');

    }

    function graphics() {
        $this->render('graphics');
    }

}

?>