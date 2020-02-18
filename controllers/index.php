<?php

class Index extends Controller{
    function __construct(){
        parent::__construct();
    }

    function render(){
        if(0==0){
            $this->view->render('login/login');
            return;
        }
        
        $this->view->render('index/home');
    }

    function saludo(){
        $response = array();
        $array = array(
            "id" => "1",
            "nombre" => "salvador",
        );
        array_push($response, $array);
        $array1 = array(
            "id" => "2",
            "nombre" => "Guadalupe",
        );
        array_push($response, $array1);

        
        $myJSON = json_encode($response);

        echo $myJSON;
    }
}

?>