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
                            <h4 >Agregar Computadoras</h4>                            
                            <img src="<?php echo URL?>public/img/login.png" class="rounded-circle" style="width: 40px;"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="row" id="frmComputadoras">
                            <input type="hidden" id="txt_idComputadora">
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_numeroInventario">Número inventario:</label>
                                <input type="text" class="form-control" placeholder="Número inventario" id="txt_numeroInventario" name="txt_numeroInventario">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_descripcion">Descripción:</label>
                                <input type="text" class="form-control" placeholder="Descripción" id="txt_descripcion" name="txt_descripcion">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_valorFactura">Valor Factura:</label>
                                <input type="text" class="form-control" placeholder="Valor Factura" id="txt_valorFactura" name="txt_valorFactura">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_valorActual">Valor Actual:</label>
                                <input type="text" class="form-control" placeholder="Valor Actual" id="txt_valorActual" name="txt_valorActual">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_marca">Marca:</label>
                                <input type="text" class="form-control" placeholder="Marca" id="txt_marca" name="txt_marca">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_modelo">Modelo:</label>
                                <input type="text" class="form-control" placeholder="Modelo" id="txt_modelo" name="txt_modelo">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_color">Color:</label>
                                <input type="text" class="form-control" placeholder="color" id="txt_color" name="txt_color">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_areaAdscripcion">Área Adscripción:</label>
                                <input type="text" class="form-control" placeholder="Área Adscripción" id="txt_areaAdscripcion" name="txt_areaAdscripcion">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_fechaAdquisicion">Fecha Adquisición:</label>
                                <input type="text" class="form-control datepicker" placeholder="Fecha Adquisición" id="txt_fechaAdquisicion" name="txt_fechaAdquisicion">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_condiciones">Condiciones:</label>
                                <input type="text" class="form-control" placeholder="Condiciones" id="txt_condiciones" name="txt_condiciones">                                
                            </div>
                            
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-primary" id="aceptarComputadora">Aceptar</button>
                                <button type="button" class="btn btn-danger" onclick="Computadoras.limpiarFormularioComputadora();">Cancelar</button>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tbComputadoras" class="table table-striped" style="width: 100%;"></table>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
            
        </div>
    </main>

  </div>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo URL;?>public/js/computadoras/computadoras.js"></script>
    <script>
        $(document).ready(()=>{
            Computadoras.init();
        });
    </script>
</body>
</html>



