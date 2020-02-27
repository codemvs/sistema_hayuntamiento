<?php 
require 'clases/escritorio_class.php';
class Escritorio extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    function render(){               
        parent::validarSesion();
        $this->view->render('escritorio/escritorio');
    }
    function getEscritorios() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            try{
                header("HTTP/1.1 200 OK");
               echo $this->model->getEscritorios();
               
            }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
            }
           exit();
           
       }
    }
    function createEscritorio() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $escritorio = new EscritorioClass();
             try{
                
                $escritorio->numeroInventario=$params['numeroInventario'];
                $escritorio->modelo=$params['modelo'];
                $escritorio->color=$params['color'];
                $escritorio->areaAdscripcion=$params['areaAdscripcion'];
                $escritorio->fechaAdquisicion=$params['fechaAdquisicion'];
                $escritorio->observacion=$params['observacion'];
                // $escritorio->fotografia=$params['fotografia'];
                header("HTTP/1.1 200 OK");
                echo $this->model->createEscritorio($escritorio);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
    function updateEscritorio() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $escritorio = new EscritorioClass();
             try{
                $escritorio->idEscritorio = $params['idEscritorio'];
                $escritorio->numeroInventario=$params['numeroInventario'];
                $escritorio->modelo=$params['modelo'];
                $escritorio->color=$params['color'];
                $escritorio->areaAdscripcion=$params['areaAdscripcion'];
                $escritorio->fechaAdquisicion=$params['fechaAdquisicion'];
                $escritorio->observacion=$params['observacion'];
                // $escritorio->fotografia=$params['fotografia'];
                header("HTTP/1.1 200 OK");
                echo $this->model->updateEscritorio($escritorio);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
    function deleteEscritorio() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $params = $_POST;

            $escritorio = new EscritorioClass();
             try{
                $escritorio->idEscritorio = $params['idEscritorio'];
                header("HTTP/1.1 200 OK");
                echo $this->model->deleteEscritorio($escritorio);
             }catch(Exception $e){
                header("HTTP/1.1 400 BAD REQUEST");
                echo $e->getMessage();
             }
           
            exit();
        }
    }
}
?>