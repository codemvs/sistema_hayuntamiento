<?php


class OtrosModel extends Model{

    public function __construct(){
        parent::__construct();
    }
    public function getOtros() {
        $query = 'SELECT idOtros, numeroInventario,
                            nombre, marca, precio,
                            condiciones, color, modelo,
                            noPiezas, areaAdscripcion,
                             fechaAdquisicion FROM tblotros;';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute();
            $respQuery->setFetchMode(PDO::FETCH_ASSOC);
      
            return json_encode( $respQuery->fetchAll()  );
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function createOtros($otros) {
        $query = 'INSERT INTO tblotros(
                numeroInventario,
                nombre,
                marca,
                precio,
                condiciones,
                color,
                modelo,
                noPiezas,
                areaAdscripcion,
                fechaAdquisicion
            ) VALUES (	
            :numeroInventario,
            :nombre,
            :marca,
            :precio,
            :condiciones,
            :color,
            :modelo,
            :noPiezas,
            :areaAdscripcion,
            :fechaAdquisicion
            );';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute([                
                'numeroInventario' => $otros->numeroInventario,
                'nombre' => $otros->nombre,
                'marca' => $otros->marca,
                'precio' => $otros->precio,
                'condiciones' => $otros->condiciones,
                'color' => $otros->color,
                'modelo' => $otros->modelo,
                'noPiezas' => $otros->noPiezas,
                'areaAdscripcion' => $otros->areaAdscripcion,
                'fechaAdquisicion' => $otros->fechaAdquisicion
            ]);
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function updateOtros($otros){
        $query = 'UPDATE tblotros SET 
                    numeroInventario=:numeroInventario,
                    nombre=:nombre,
                    marca=:marca,
                    precio=:precio,
                    condiciones=:condiciones,
                    color=:color,
                    modelo=:modelo,
                    noPiezas=:noPiezas,
                    areaAdscripcion=:areaAdscripcion,
                    fechaAdquisicion=:fechaAdquisicion
                    WHERE idOtros=:idOtros;';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute([                
                'numeroInventario' => $otros->numeroInventario,
                'nombre' => $otros->nombre,
                'marca' => $otros->marca,
                'precio' => $otros->precio,
                'condiciones' => $otros->condiciones,
                'color' => $otros->color,
                'modelo' => $otros->modelo,
                'noPiezas' => $otros->noPiezas,
                'areaAdscripcion' => $otros->areaAdscripcion,
                'fechaAdquisicion' => $otros->fechaAdquisicion,
                'idOtros' => $otros->idOtros,
            ]);
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function deleteOtros($otros){
        $query = 'DELETE FROM tblotros WHERE idOtros=:idOtros';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute([                
                'idOtros'=>$otros->idOtros
            ]);
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
}

?>