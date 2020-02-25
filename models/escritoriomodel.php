<?php 
class EscritorioModel extends Model{
    function __construct()
    {
        parent::__construct();
    }
    public function getEscritorios() {
        $query = ' SELECT idEscritorio, numeroInventario,
         modelo, color, areaAdscripcion, fechaAdquisicion,
         observacion, fotografia FROM tblescritorio';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute();
            $respQuery->setFetchMode(PDO::FETCH_ASSOC);
      
            return json_encode( $respQuery->fetchAll()  );
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function createEscritorio($escritorio){
        $query = 'INSERT INTO tblescritorio( numeroInventario,
         modelo, color, areaAdscripcion, fechaAdquisicion,
          observacion, fotografia ) VALUES (:numeroInventario, :modelo,
           :color, :areaAdscripcion, :fechaAdquisicion, :observacion, :fotografia)';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute([  
                'numeroInventario'=>$escritorio->numeroInventario,
                'modelo'=>$escritorio->modelo,
                'color'=>$escritorio->color,
                'areaAdscripcion'=>$escritorio->areaAdscripcion,
                'fechaAdquisicion'=>$escritorio->fechaAdquisicion,
                'observacion'=>$escritorio->observacion,
                // 'fotografia'=>$escritorio->fotografia
                'fotografia'=>''
            ]);
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function updateEscritorio($escritorio){
        $query = 'UPDATE tblescritorio SET 
                    numeroInventario=:numeroInventario,
                    modelo=:modelo,
                    color=:color,
                    areaAdscripcion=:areaAdscripcion,
                    fechaAdquisicion=:fechaAdquisicion,
                    observacion=:observacion,
                    fotografia=:fotografia 
                    WHERE idEscritorio=:idEscritorio;';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute([                
                'idEscritorio'=>$escritorio->idEscritorio,
                'numeroInventario'=>$escritorio->numeroInventario,
                'modelo'=>$escritorio->modelo,
                'color'=>$escritorio->color,
                'areaAdscripcion'=>$escritorio->areaAdscripcion,
                'fechaAdquisicion'=>$escritorio->fechaAdquisicion,
                'observacion'=>$escritorio->observacion,
                // 'fotografia'=>$escritorio->fotografia
                'fotografia'=>''
            ]);
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
    public function deleteEscritorio($escritorio){
        $query = 'DELETE FROM tblescritorio WHERE idEscritorio=:idEscritorio';
        try{
            $respQuery = $this->db->connect()->prepare($query);
        
            $respQuery->execute([                
                'idEscritorio'=>$escritorio->idEscritorio
            ]);
            
        }catch(PDOException $e){
            throw new Exception($e->getMessage());
        }
    }
}
?>