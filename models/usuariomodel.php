<?php

// require 'clases/usuario_class.php';

class UsuarioModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function createUsuario($usuario) {
        $query = 'INSERT INTO tblusuario( nombre, apellidos, domicilio, telefono, celular, fechaNacimiento, rfc, curp, email, contrasenia)
                     VALUES (:nombre, :apellidos, :domicilio, :telefono, :celular, :fechaNacimiento, :rfc, :curp, :email, :contrasenia)';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute([
                'nombre'=>$usuario->nombre,
                'apellidos'=>$usuario->apellidos,
                'domicilio'=>$usuario->domicilio,
                'telefono'=>$usuario->telefono,
                'celular'=>$usuario->celular,
                'fechaNacimiento'=>$usuario->fechaNacimiento,
                'rfc'=>$usuario->rfc,
                'curp'=>$usuario->curp,
                'email'=>$usuario->email,
                'contrasenia'=>$usuario->contrasenia
            ]);
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function iniciarSesion($usuario) {
        $query = 'SELECT idUsuario, nombre, apellidos,email 
                    FROM tblusuario 
                        WHERE email = :email AND contrasenia = :contrasenia LIMIT 1';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute([
                'email'=>$usuario->email,
                'contrasenia'=>$usuario->contrasenia
            ]);
            $respQuery->setFetchMode(PDO::FETCH_ASSOC);
      
            return json_encode( $respQuery->fetch()  );
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
}

?>