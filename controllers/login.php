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
    function cerrarSession(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            
            session_destroy();
            
            header("HTTP/1.1 200 OK");    
            // Destruir todas las variables de sesión.
            // $_SESSION = array();

            // Si se desea destruir la sesión completamente, borre también la cookie de sesión.
            // Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
            // if (ini_get("session.use_cookies")) {
            //     $params = session_get_cookie_params();
            //     setcookie(session_name(), '', time() - 42000,
            //         $params["path"], $params["domain"],
            //         $params["secure"], $params["httponly"]
            //     );
            // }

            // Finalmente, destruir la sesión.
            
            parent::cerrarSesion();
            exit();
            
        }
    }
}
?>