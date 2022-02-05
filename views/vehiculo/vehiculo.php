<!DOCTYPE html>
<html lang="es">
    <?php require 'views/head.php'; ?>
<body>
    <?php require 'views/header.php'; ?>

    <main class="container mt-1">
        <div class="card-group">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="title-header">
                            <h4 >Agregar Vehículo</h4>                            
                            <img src="<?php echo URL?>public/img/login.png" class="rounded-circle" style="width: 40px;"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="frmVehiculo" class="row">
                            <input type="hidden" id="txt_idVehiculo">
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_numeroInventario"> No. inventario:</label>
                                <input type="text" class="form-control" placeholder=" No. inventario" id="txt_numeroInventario" name="txt_numeroInventario">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_numeroSerie"> No. Serie:</label>
                                <input type="text" class="form-control" placeholder=" No. Serie" id="txt_numeroSerie" name="txt_numeroSerie">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_marca"> Marca:</label>
                                <input type="text" class="form-control" placeholder="Marca" id="txt_marca" name="txt_marca">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_mdelo"> Modelo:</label>
                                <input type="text" class="form-control" placeholder=" Modelo" id="txt_mdelo" name="txt_mdelo">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_color"> Color:</label>
                                <input type="text" class="form-control" placeholder=" Color" id="txt_color" name="txt_color">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_linea">Línea:</label>
                                <input type="text" class="form-control" placeholder="Línea" id="txt_linea" name="txt_linea">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_numeroMotor"> No. motor:</label>
                                <input type="text" class="form-control" placeholder=" No. motor" id="txt_numeroMotor" name="txt_numeroMotor">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_placa"> Placa:</label>
                                <input type="text" class="form-control" placeholder=" Placa" id="txt_placa" name="txt_placa">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_areaAdscripcion"> Área adscripción:</label>
                                <input type="text" class="form-control" placeholder=" Área adscripción" id="txt_areaAdscripcion" name="txt_areaAdscripcion">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_condicionVehiculo"> Condición Vehículo:</label>
                                <input type="text" class="form-control" placeholder=" Condición Vehículo" id="txt_condicionVehiculo" name="txt_condicionVehiculo">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_fechaAquisicion"> Fecha adquisición:</label>
                                <input type="text" class="form-control datepicker" placeholder=" Fecha adquisición" id="txt_fechaAquisicion" name="txt_fechaAquisicion">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_observacion"> Observación:</label>
                                <input type="text" class="form-control" placeholder=" Observación" id="txt_observacion" name="txt_observacion">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_descripcion"> Descripción:</label>
                                <input type="text" class="form-control" placeholder=" Descripción" id="txt_descripcion" name="txt_descripcion">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_valorActual"> Valor actual:</label>
                                <input type="text" class="form-control" placeholder=" Valor actual" id="txt_valorActual" name="txt_valorActual">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_valorFactura"> Valor Factura:</label>
                                <input type="text" class="form-control" placeholder=" Valor Factura" id="txt_valorFactura" name="txt_valorFactura">                                
                            </div>                            

                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-primary" id="aceptarVehiculo">Aceptar</button>
                                <button type="button" class="btn btn-danger" onclick="Vehiculo.limpiarFormularioVehiculo();">Cancelar</button>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tbVehiculo" class="table table-striped" style="width: 100%;"></table>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
            
        </div>
    </main>

  </div>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo URL;?>public/js/vehiculo/vehiculo.js"></script>
    <script>
        $(document).ready(()=>{
            Vehiculo.init();
        });
    </script>
</body>
</html>



