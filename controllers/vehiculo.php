<?php 
require 'clases/vehiculo_class.php';
class Vehiculo extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    
    function getVehiculos() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                //try{
                // $resoponse = '{
                //     success:true,
                //     data:'..'
                // }';
                echo $this->model->getVehiculos();
                
            //  }catch(Exception $e){

            //  }
            exit();
            
        }
    }
    function createVehiculo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $_POST;

            $vehiculo = new VehiculoClass();
                //try{                
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
                $vehiculo->fotografia = $params['fotografia'];
                    
                echo $this->model->createVehiculo($vehiculo);
            //  }catch(Exception $e){

            //  }
            
            exit();
        }
    }
    function updateVehiculo() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $params = $_POST;

            $vehiculo = new VehiculoClass();
                //try{                
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
                $vehiculo->fotografia = $params['fotografia'];

                $vehiculo->idVehiculo = $params['idVehiculo'];
                echo $this->model->updateVehiculo($vehiculo);
            //  }catch(Exception $e){

            //  }
            
            exit();
        }
    }      
    function deleteVehiculo() {
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $params = $_POST;
    
                $vehiculo = new VehiculoClass();
                 //try{
                    
                    $vehiculo->idVehiculo = $params['idVehiculo'];
        
                    $this->model->deleteVehiculo($vehiculo);
                //  }catch(Exception $e){
    
                //  }
               
                exit();
            }
        
    }
}
?>