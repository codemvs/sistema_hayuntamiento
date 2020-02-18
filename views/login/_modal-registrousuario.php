<!-- The Modal -->
<div class="modal" id="modRegistroUsuario">
        <div class="modal-dialog modal-lg">
            <form id="frmRegistroUsuario">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Registro de usuario</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-4 form-group">
                            <label for="txtNombre">Nombre:</label>
                            <input type="text" id="txtNombre" class="form-control" placeholder="Nombre" autofocus/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtApellidos">Apellidos:</label>
                            <input type="text" id="txtApellidos" class="form-control" placeholder="Apellidos"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtDomicilio">Domicilio:</label>
                            <input type="text" id="txtDomicilio" class="form-control" placeholder="Domicilio"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtTelefono">Teléfono:</label>
                            <input type="text" id="txtTelefono" class="form-control" placeholder="Teléfono Fijo"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtCelular">Celular:</label>
                            <input type="text" id="txtCelular" class="form-control" placeholder="Celular"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtFechaNacimiento">Fecha Nacimiento:</label>
                            <input type="text" id="txtFechaNacimiento" class="form-control" placeholder="dd/mm/aaaa"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtRfc">RFC:</label>
                            <input type="text" id="txtRfc" class="form-control" placeholder="RFC"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtCurp">CURP:</label>
                            <input type="text" id="txtCurp" class="form-control" placeholder="CURP"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtEmail">Correo electrónico:</label>
                            <input type="text" id="txtEmail" class="form-control" placeholder="Correo electrónico"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtPassword">Contraseña:</label>
                            <input type="text" id="txtPassword" class="form-control" placeholder="Contraseña"/>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnRegistroUsuario" class="btn btn-primary">Registrar Usuario</button>
                </div>
            </form>
            </div>
        </div>
    </div>