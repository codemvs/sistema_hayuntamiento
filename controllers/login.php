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
            $usuario->nombre=$params['nombre'];
            $usuario->apellidos=$params['apellidos'];
            $usuario->domicilio=$params['domicilio'];
            $usuario->telefono=$params['telefono'];
            $usuario->celular=$params['celular'];
            $usuario->fechaNacimiento=$params['fechaNacimiento'];
            $usuario->rfc=$params['rfc'];
            $usuario->curp=$params['curp'];
            $usuario->email=$params['email'];
            $usuario->contrasenia=$params['contrasenia'];

            $postId = 1;
            if($postId)
            {
            
            //header("HTTP/1.1 400 OK");

            echo $this->model->createUsuario($usuario);
            exit();
            }
        }
    }
}
?>