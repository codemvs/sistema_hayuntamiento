<?php 
    class VehiculoModel extends Model{
        public function __construct(){
            parent::__construct();
        }
        public function getVehiculos() {
            $query = 'SELECT idVehiculo, numeroInventario, numeroSerie, marca,
              mdelo, color, linea, numeroMotor, placa, areaAdscripcion,
              condicionVehiculo, fechaAquisicion, observacion, descripcion,
              valorActual, valorFactura, fotografia
             FROM tblvehiculo;';
            try{
                $respQuery = $this->db->connect()->prepare($query);
            
                $respQuery->execute();
                $respQuery->setFetchMode(PDO::FETCH_ASSOC);
          
                return json_encode( $respQuery->fetchAll()  );
                
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function createVehiculo($vehiculo) {
            $query = 'INSERT INTO tblvehiculo( numeroInventario,
                                                 numeroSerie, marca, mdelo,
                                                  color, linea, numeroMotor,
                                                  placa, areaAdscripcion,
                                                  condicionVehiculo, fechaAquisicion,
                                                  observacion, descripcion, valorActual,
                                                  valorFactura, fotografia)
                                                  VALUES (:numeroInventario,
                                                  :numeroSerie,:marca,:mdelo,:color,
                                                  :linea,:numeroMotor,:placa,:areaAdscripcion,
                                                  :condicionVehiculo,:fechaAquisicion,
                                                  :observacion,:descripcion,:valorActual,
                                                  :valorFactura,:fotografia);';
            try{
                $respQuery = $this->db->connect()->prepare($query);
            
                $respQuery->execute([                                    
                    'numeroInventario'=>$vehiculo->numeroInventario,
                    'numeroSerie'=>$vehiculo->numeroSerie,
                    'marca'=>$vehiculo->marca,
                    'mdelo'=>$vehiculo->mdelo,
                    'color'=>$vehiculo->color,
                    'linea'=>$vehiculo->linea,
                    'numeroMotor'=>$vehiculo->numeroMotor,
                    'placa'=>$vehiculo->placa,
                    'areaAdscripcion'=>$vehiculo->areaAdscripcion,
                    'condicionVehiculo'=>$vehiculo->condicionVehiculo,
                    'fechaAquisicion'=>$vehiculo->fechaAquisicion,
                    'observacion'=>$vehiculo->observacion,
                    'descripcion'=>$vehiculo->descripcion,
                    'valorActual'=>$vehiculo->valorActual,
                    'valorFactura'=>$vehiculo->valorFactura,
                    'fotografia'=>$vehiculo->fotografia
                ]);
                
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function updateVehiculo($vehiculo) {
            $query = 'UPDATE tblvehiculo SET
                        numeroInventario=:numeroInventario,
                        numeroSerie=:numeroSerie,
                        marca=:marca,
                        mdelo=:mdelo,
                        color=:color,
                        linea=:linea,
                        numeroMotor=:numeroMotor,
                        placa=:placa,
                        areaAdscripcion=:areaAdscripcion,
                        condicionVehiculo=:condicionVehiculo,
                        fechaAquisicion=:fechaAquisicion,
                        observacion=:observacion,
                        descripcion=:descripcion,
                        valorActual=:valorActual,
                        valorFactura=:valorFactura,
                        fotografia=:fotografia 
                            WHERE idVehiculo = :idVehiculo;';
            try{
                $respQuery = $this->db->connect()->prepare($query);
            
                $respQuery->execute([                                    
                    'numeroInventario'=>$vehiculo->numeroInventario,
                    'numeroSerie'=>$vehiculo->numeroSerie,
                    'marca'=>$vehiculo->marca,
                    'mdelo'=>$vehiculo->mdelo,
                    'color'=>$vehiculo->color,
                    'linea'=>$vehiculo->linea,
                    'numeroMotor'=>$vehiculo->numeroMotor,
                    'placa'=>$vehiculo->placa,
                    'areaAdscripcion'=>$vehiculo->areaAdscripcion,
                    'condicionVehiculo'=>$vehiculo->condicionVehiculo,
                    'fechaAquisicion'=>$vehiculo->fechaAquisicion,
                    'observacion'=>$vehiculo->observacion,
                    'descripcion'=>$vehiculo->descripcion,
                    'valorActual'=>$vehiculo->valorActual,
                    'valorFactura'=>$vehiculo->valorFactura,
                    'fotografia'=>$vehiculo->fotografia,
                    'idVehiculo'=>$vehiculo->idVehiculo
                ]);
                
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
        public function deleteVehiculo($vehiculo){
            $query = 'DELETE FROM tblvehiculo WHERE idVehiculo = :idVehiculo';
            try{
                $respQuery = $this->db->connect()->prepare($query);
            
                $respQuery->execute([
                    'idVehiculo' => $vehiculo->idVehiculo
                ]);
                
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }
    }

?>