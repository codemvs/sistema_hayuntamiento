<?php

class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render(){
        if(0==1){
            $this->view->render('login/login');
            return;
        }
        
        $this->view->render('index/home');
    }
   
}

?>