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
    function iniciarSesion(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $params = $_POST;           
            try{
                $usuario = new UsuarioClass(); 
                $usuario->email=$params['email'];
                $usuario->contrasenia=$params['contrasenia'];     
                $respUsuario = $this->model->iniciarSesion($usuario);
                if($respUsuario == null){                    
                    header("HTTP/1.1 401 UNAUTHORIZED");
                    echo "El usuario no es válido";
                    exit();                    
                }
                $_SESSION["usuario"] = "ok";
                header("HTTP/1.1 200 OK");                
                echo json_encode($respUsuario);
                exit();
                
            }catch(Exception $ex){
                
                header("HTTP/1.1 400 BAD REQUEST");
                echo $ex->getMessage();
                exit();
            }           
            
        }
    }
    function recuperarContrasenia(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $params = $_POST;           
            
            $usuario = new UsuarioClass();                
            
            $correoValido = isset($params['email']) && filter_var($params['email'], FILTER_VALIDATE_EMAIL);
            
            $contraseniaValido = isset($params['password']) && isset($params['password2']) && $params['password'] == $params['password2'];
            
            if($contraseniaValido!=1 || $correoValido!=1){
                header("HTTP/1.1 401 UNAUTHORIZED");
                    echo "Revisar que los valores sean correctos";
                    exit();   
            }
            $usuario->email=$params['email'];
            $usuario->contrasenia=$params['password'];

            $postId = 1;
            if($postId)
            {            
            //header("HTTP/1.1 400 OK");
            echo $this->model->actualizarContrasenia($usuario);            
            exit();
            }
        }
    }
    
}
?>