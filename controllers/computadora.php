<?php 
require 'clases/computadora_class.php';
class Computadora extends Controller{
    function __construct(){
        parent::__construct();
    }
    function getComputadoras() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
             //try{
                // $resoponse = '{
                //     success:true,
                //     data:'..'
                // }';
                echo $this->model->getComputadoras();
                
            //  }catch(Exception $e){

            //  }
            exit();
            
        }
    }
    function createComputadora() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $computadora = new ComputadoraClass();
             try{
                $computadora->numeroInventario = $params['numeroInventario'];
                $computadora->descripcion = $params['descripcion'];
                $computadora->valorFactura = $params['valorFactura'];
                $computadora->valorActual = $params['valorActual'];
                $computadora->marca = $params['marca'];
                $computadora->modelo = $params['modelo'];
                $computadora->color = $params['color'];
                $computadora->areaAdscripcion = $params['areaAdscripcion'];
                $computadora->fechaAdquisicion = $params['fechaAdquisicion'];
                $computadora->condiciones = $params['condiciones'];
                // $computadora->fotografia = $params['fotografia'];
                header("HTTP/1.1 200 OK");  
                echo $this->model->createComputadora($computadora);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
    function updateComputadora() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $computadora = new ComputadoraClass();
             try{
                $computadora->numeroInventario = $params['numeroInventario'];
                $computadora->descripcion = $params['descripcion'];
                $computadora->valorFactura = $params['valorFactura'];
                $computadora->valorActual = $params['valorActual'];
                $computadora->marca = $params['marca'];
                $computadora->modelo = $params['modelo'];
                $computadora->color = $params['color'];
                $computadora->areaAdscripcion = $params['areaAdscripcion'];
                $computadora->fechaAdquisicion = $params['fechaAdquisicion'];
                $computadora->condiciones = $params['condiciones'];
                // $computadora->fotografia = $params['fotografia'];

                $computadora->idComputadora = $params['idComputadora'];

                header("HTTP/1.1 200 OK");  
                echo $this->model->updateComputadora($computadora);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
    function deleteComputadora() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $computadora = new ComputadoraClass();
             try{
                
                $computadora->idComputadora = $params['idComputadora'];
                header("HTTP/1.1 200 OK");  
                echo $this->model->deleteComputadora($computadora);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
}
?>