<?php 
require 'clases/escritorio_class.php';
class Escritorio extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    function getEscritorio() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            //try{
               // $resoponse = '{
               //     success:true,
               //     data:'..'
               // }';
               echo $this->model->getEscritorio();
               
           //  }catch(Exception $e){

           //  }
           exit();
           
       }
    }
    function createEscritorio() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $escritorio = new EscritorioClass();
             //try{
                
                $escritorio->numeroInventario=$params['numeroInventario'];
                $escritorio->modelo=$params['modelo'];
                $escritorio->color=$params['color'];
                $escritorio->areaAdscripcion=$params['areaAdscripcion'];
                $escritorio->fechaAdquisicion=$params['fechaAdquisicion'];
                $escritorio->observacion=$params['observacion'];
                $escritorio->fotografia=$params['fotografia'];
    
                echo $this->model->createEscritorio($escritorio);
            //  }catch(Exception $e){

            //  }
           
            exit();
        }
    }
    function updateEscritorio() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $escritorio = new EscritorioClass();
             //try{
                $escritorio->idEscritorio = $params['idEscritorio'];
                $escritorio->numeroInventario=$params['numeroInventario'];
                $escritorio->modelo=$params['modelo'];
                $escritorio->color=$params['color'];
                $escritorio->areaAdscripcion=$params['areaAdscripcion'];
                $escritorio->fechaAdquisicion=$params['fechaAdquisicion'];
                $escritorio->observacion=$params['observacion'];
                $escritorio->fotografia=$params['fotografia'];
    
                echo $this->model->updateEscritorio($escritorio);
            //  }catch(Exception $e){

            //  }
           
            exit();
        }
    }
    function deleteEscritorio() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $escritorio = new EscritorioClass();
             //try{
                $escritorio->idEscritorio = $params['idEscritorio'];
                    
                echo $this->model->deleteEscritorio($escritorio);
            //  }catch(Exception $e){

            //  }
           
            exit();
        }
    }
}
?>