<?php

class Controller{
    
    function __construct(){            
        $this->view = new View();        
    }

    function loadModel($model){
        $url = 'models/'.$model.'model.php';

        if(file_exists($url)){
            require $url;
            
            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
    function validarSesion() {
        if(sizeof($_SESSION) == 0){
            header('Location: '.URL.'login');
        }
        
    }
}

?>