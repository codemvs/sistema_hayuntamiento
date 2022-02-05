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
                            <h4 >Agregar Otros</h4>                            
                            <img src="<?php echo URL?>public/img/login.png" class="rounded-circle" style="width: 40px;"/>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="frmOtros" class="row">
                            <input type="hidden" id="txt_idOtros">                            
                            
							<div class="col-sm-4 form-group">                                
                                <label for="txt_numeroInventario">No. Inventario:</label>
                                <input type="text" class="form-control" placeholder="No. Inventario" id="txt_numeroInventario" name="txt_numeroInventario">                                
                            </div>
                            
							<div class="col-sm-4 form-group">                                
                                <label for="txt_nombre">Nombre:</label>
                                <input type="text" class="form-control" placeholder="Nombre" id="txt_nombre" name="txt_nombre">                                
                            </div>

							<div class="col-sm-4 form-group">                                
                                <label for="txt_marca">Marca:</label>
                                <input type="text" class="form-control" placeholder="Marca" id="txt_marca" name="txt_marca">                                
                            </div>

							<div class="col-sm-4 form-group">                                
                                <label for="txt_precio">Precio:</label>
                                <input type="text" class="form-control" placeholder="Precio" id="txt_precio" name="txt_precio">                                
                            </div>

							<div class="col-sm-4 form-group">                                
                                <label for="txt_condiciones">Condiciones:</label>
                                <input type="text" class="form-control" placeholder="Condiciones" id="txt_condiciones" name="txt_condiciones">                                
                            </div>

							<div class="col-sm-4 form-group">                                
                                <label for="txt_color">Color:</label>
                                <input type="text" class="form-control" placeholder="Color" id="txt_color" name="txt_color">                                
                            </div>
                            
							<div class="col-sm-4 form-group">                                
                                <label for="txt_modelo">Modelo:</label>
                                <input type="text" class="form-control" placeholder="Modelo" id="txt_modelo" name="txt_modelo">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_noPiezas">No. Piezas:</label>
                                <input type="text" class="form-control" placeholder="No. Piezas" id="txt_noPiezas" name="txt_noPiezas">                                
                            </div>

							<div class="col-sm-4 form-group">                                
                                <label for="txt_areaAdscripcion">Área adscripción:</label>
                                <input type="text" class="form-control" placeholder="Área adscripción" id="txt_areaAdscripcion" name="txt_areaAdscripcion">                                
                            </div>
                            
							<div class="col-sm-4 form-group">                                
                                <label for="txt_fechaAdquisicion">Fecha adquisición:</label>
                                <input type="text" class="form-control datepicker" placeholder="Fecha adquisición" id="txt_fechaAdquisicion" name="txt_fechaAdquisicion">                                
                            </div>

                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-primary" id="aceptarOtros">Aceptar</button>
                                <button type="button" class="btn btn-danger" onclick="Otros.limpiarFormularioOtros();">Cancelar</button>
                            </div>
                            

                        </form>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tbOtros" class="table table-striped" style="width: 100%;"></table>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
            
        </div>
    </main>

  </div>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo URL;?>public/js/otros/otros.js"></script>
    <script>
        $(document).ready(()=>{
            Otros.init();
        });
    </script>
</body>
</html>



