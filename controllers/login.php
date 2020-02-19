<?php
// Clases
require 'clases/usuario_class.php';

class Login extends Controller{
    
    function __construct()
    {
        parent::__construct();        
        parent::loadModel('usuario');
    }
    function render(){
        $this->view->render("login/login");
    }
    // Crear un nuevo post
    function createUsuario(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $params = $_POST;
           
            
            $usuario = new UsuarioClass();
            $usuario->nombre= $params['nombre'];
            
            $postId = 1;
            if($postId)
            {
            $input['id'] = $postId;
            header("HTTP/1.1 200 OK");

            echo $this->model->createUsuario($usuario);
            exit();
            }
        }
    }
}
?>