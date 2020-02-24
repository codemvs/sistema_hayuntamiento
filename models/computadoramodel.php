<?php 
    class ComputadoraModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function getComputadoras(){
            $query = 'SELECT idComputadora, numeroInventario, descripcion,
            valorFactura, valorActual, marca, modelo, color,
            areaAdscripcion, fechaAdquisicion, condiciones, fotografia 
            FROM tblcomputadora;';
            try{
                $respQuery = $this->db->connect()->prepare($query);
            
                $respQuery->execute();
                $respQuery->setFetchMode(PDO::FETCH_ASSOC);
          
                return json_encode( $respQuery->fetchAll()  );
                
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function createComputadora($computadora){
            $query = 'INSERT INTO tblcomputadora(numeroInventario, descripcion, valorFactura,
                                                 valorActual, marca, modelo, color, areaAdscripcion,
                                                 fechaAdquisicion, condiciones, fotografia ) 
                                         VALUES (:numeroInventario, :descripcion, :valorFactura,
                                                 :valorActual, :marca, :modelo, :color, :areaAdscripcion,
                                                 :fechaAdquisicion, :condiciones, :fotografia )';
            try{
                $respQuery = $this->db->connect()->prepare($query);
            
                $respQuery->execute([                
                    'numeroInventario'=>$computadora->numeroInventario,
                    'descripcion'=>$computadora->descripcion,
                    'valorFactura'=>$computadora->valorFactura,
                    'valorActual'=>$computadora->valorActual,
                    'marca'=>$computadora->marca,
                    'modelo'=>$computadora->modelo,
                    'color'=>$computadora->color,
                    'areaAdscripcion'=>$computadora->areaAdscripcion,
                    'fechaAdquisicion'=>$computadora->fechaAdquisicion,
                    'condiciones'=>$computadora->condiciones,
                    // 'fotografia'=>$computadora->fotografia
                    'fotografia'=>''
                ]);
                
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function updateComputadora($computadora){
            $query = 'UPDATE tblcomputadora SET 
                        numeroInventario=:numeroInventario,
                        descripcion=:descripcion,
                        valorFactura=:valorFactura,
                        valorActual=:valorActual,
                        marca=:marca,
                        modelo=:modelo,
                        color=:color,
                        areaAdscripcion=:areaAdscripcion,
                        fechaAdquisicion=:fechaAdquisicion,
                        condiciones=:condiciones,
                        fotografia=:fotografia 
                            WHERE idComputadora = :idComputadora;';
            try{
                $respQuery = $this->db->connect()->prepare($query);
            
                $respQuery->execute([                
                    'numeroInventario'=>$computadora->numeroInventario,
                    'descripcion'=>$computadora->descripcion,
                    'valorFactura'=>$computadora->valorFactura,
                    'valorActual'=>$computadora->valorActual,
                    'marca'=>$computadora->marca,
                    'modelo'=>$computadora->modelo,
                    'color'=>$computadora->color,
                    'areaAdscripcion'=>$computadora->areaAdscripcion,
                    'fechaAdquisicion'=>$computadora->fechaAdquisicion,
                    'condiciones'=>$computadora->condiciones,
                    // 'fotografia'=>$computadora->fotografia,
                    'fotografia'=>'',
                    'idComputadora' => $computadora->idComputadora
                ]);
                
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function deleteComputadora($computadora){
            $query = 'DELETE FROM tblcomputadora WHERE idComputadora = :idComputadora';
            try{
                $respQuery = $this->db->connect()->prepare($query);
            
                $respQuery->execute([
                    'idComputadora' => $computadora->idComputadora
                ]);
                
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
    }

?>