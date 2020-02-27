<?php

class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render(){    
        parent::validarSesion();
        $this->view->render('index/home');
    }
   
}

?>