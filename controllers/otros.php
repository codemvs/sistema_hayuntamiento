<?php 
require 'clases/otros_class.php';
class Otros extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    function render(){               
        parent::validarSesion();
        $this->view->render('otros/otros');
    }
    function getOtros() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            try{
                header("HTTP/1.1 200 OK");
               echo $this->model->getOtros();
               
            }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
            }
           exit();
           
       }
    }
    function createOtros() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $otros = new OtrosClass();
             try{
                $otros->numeroInventario = $params['numeroInventario'];
                $otros->nombre = $params['nombre'];
                $otros->marca = $params['marca'];
                $otros->precio = $params['precio'];
                $otros->condiciones = $params['condiciones'];
                $otros->color = $params['color'];
                $otros->modelo = $params['modelo'];
                $otros->noPiezas = $params['noPiezas'];
                $otros->areaAdscripcion = $params['areaAdscripcion'];
                $otros->fechaAdquisicion = $params['fechaAdquisicion'];
                
                header("HTTP/1.1 200 OK");
                echo $this->model->createOtros($otros);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
    function updateOtros() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $otros = new OtrosClass();
             try{
                $otros->idOtros = $params['idOtros'];
                $otros->numeroInventario = $params['numeroInventario'];
                $otros->nombre = $params['nombre'];
                $otros->marca = $params['marca'];
                $otros->precio = $params['precio'];
                $otros->condiciones = $params['condiciones'];
                $otros->color = $params['color'];
                $otros->modelo = $params['modelo'];
                $otros->noPiezas = $params['noPiezas'];
                $otros->areaAdscripcion = $params['areaAdscripcion'];
                $otros->fechaAdquisicion = $params['fechaAdquisicion'];
                header("HTTP/1.1 200 OK");
                echo $this->model->updateOtros($otros);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
    function deleteOtros() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $otros = new OtrosClass();
             try{
                $otros->idOtros = $params['idOtros'];
                header("HTTP/1.1 200 OK");
                echo $this->model->deleteOtros($otros);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
}
?>