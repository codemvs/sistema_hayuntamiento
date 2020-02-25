<!DOCTYPE html>
<html lang="es">
    <?php require 'views/head.php'; ?>
<body>
    <?php require 'views/header.php'; ?>

    <main class="container mt-1">
        <div class="card-group">

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"><h4>Agregar Escritorio</h4></div>
                    <div class="card-body">
                        <form id="frmEscritorio" class="row">
                            <input type="hidden" id="txt_idEscritorio">
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_numeroInventario">No. Inventario:</label>
                                <input type="text" class="form-control" placeholder="No. Inventario" id="txt_numeroInventario">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_modelo"> Modelo:</label>
                                <input type="text" class="form-control" placeholder=" Modelo " id="txt_modelo">                                
                            </div>

                            <div class="col-sm-4 form-group">                                
                                <label for="txt_color"> Color:</label>
                                <input type="text" class="form-control" placeholder=" Color " id="txt_color">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_areaAdscripcion"> Área adscripción:</label>
                                <input type="text" class="form-control" placeholder=" Área adscripción" id="txt_areaAdscripcion">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_fechaAdquisicion"> Fecha Adquisición:</label>
                                <input type="text" class="form-control" placeholder=" Fecha Adquisición" id="txt_fechaAdquisicion">                                
                            </div>
                            
                            <div class="col-sm-4 form-group">                                
                                <label for="txt_observacion"> Observación:</label>
                                <input type="text" class="form-control" placeholder=" Observación" id="txt_observacion">                                
                            </div>

                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-primary" id="aceptarEscritorio">Aceptar</button>
                                <button type="button" class="btn btn-danger" onclick="Escritorio.limpiarFormularioEscritorio();">Cancelar</button>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="tbEscritorio" class="table table-striped" style="width: 100%;"></table>
                            </div>
                        </div>
                    </div>                
                </div>
            </div>
            
        </div>
    </main>

  </div>
    <?php require 'views/footer.php'; ?>
    <script src="<?php echo URL;?>public/js/escritorios/escritorio.js"></script>
    <script>
        $(document).ready(()=>{
            Escritorio.init();
        });
    </script>
</body>
</html>



