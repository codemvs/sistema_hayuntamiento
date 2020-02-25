<?php 
require 'clases/vehiculo_class.php';
class Vehiculo extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    function render() {              
        
        $this->view->render('vehiculo/vehiculo');
    }
    function getVehiculos() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            try{
                header("HTTP/1.1 200 OK");
                echo $this->model->getVehiculos();
                
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
            exit();
            
        }
    }
    function createVehiculo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $_POST;

            $vehiculo = new VehiculoClass();
            try{                
                $vehiculo->numeroInventario = $params['numeroInventario'];
                $vehiculo->numeroSerie = $params['numeroSerie'];
                $vehiculo->marca = $params['marca'];
                $vehiculo->mdelo = $params['mdelo'];
                $vehiculo->color = $params['color'];
                $vehiculo->linea = $params['linea'];
                $vehiculo->numeroMotor = $params['numeroMotor'];
                $vehiculo->placa = $params['placa'];
                $vehiculo->areaAdscripcion = $params['areaAdscripcion'];
                $vehiculo->condicionVehiculo = $params['condicionVehiculo'];
                $vehiculo->fechaAquisicion = $params['fechaAquisicion'];
                $vehiculo->observacion = $params['observacion'];
                $vehiculo->descripcion = $params['descripcion'];
                $vehiculo->valorActual = $params['valorActual'];
                $vehiculo->valorFactura = $params['valorFactura'];
                // $vehiculo->fotografia = $params['fotografia'];
                header("HTTP/1.1 200 OK");    
                echo $this->model->createVehiculo($vehiculo);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
            
            exit();
        }
    }
    function updateVehiculo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $_POST;

            $vehiculo = new VehiculoClass();
            try{                
                $vehiculo->numeroInventario = $params['numeroInventario'];
                $vehiculo->numeroSerie = $params['numeroSerie'];
                $vehiculo->marca = $params['marca'];
                $vehiculo->mdelo = $params['mdelo'];
                $vehiculo->color = $params['color'];
                $vehiculo->linea = $params['linea'];
                $vehiculo->numeroMotor = $params['numeroMotor'];
                $vehiculo->placa = $params['placa'];
                $vehiculo->areaAdscripcion = $params['areaAdscripcion'];
                $vehiculo->condicionVehiculo = $params['condicionVehiculo'];
                $vehiculo->fechaAquisicion = $params['fechaAquisicion'];
                $vehiculo->observacion = $params['observacion'];
                $vehiculo->descripcion = $params['descripcion'];
                $vehiculo->valorActual = $params['valorActual'];
                $vehiculo->valorFactura = $params['valorFactura'];
                // $vehiculo->fotografia = $params['fotografia'];

                $vehiculo->idVehiculo = $params['idVehiculo'];

                header("HTTP/1.1 200 OK");  
                echo $this->model->updateVehiculo($vehiculo);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
            
            exit();
        }
    }      
    function deleteVehiculo() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $params = $_POST;
    
                $vehiculo = new VehiculoClass();
                 try{
                    
                    $vehiculo->idVehiculo = $params['idVehiculo'];
                    header("HTTP/1.1 200 OK");  
                    $this->model->deleteVehiculo($vehiculo);
                 }catch(Exception $e){
                    header("HTTP/1.1 400 BAD REQUEST");
                    echo $e->getMessage();
                 }
               
                exit();
            }
        
    }
}
?>