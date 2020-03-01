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
                            <input type="text" id="txtNombre" name="txtNombre" 
                                    class="form-control" placeholder="Nombre" autofocus/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtApellidos">Apellidos:</label>
                            <input type="text" id="txtApellidos" name="txtApellidos" 
                                    class="form-control" placeholder="Apellidos"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtDomicilio">Domicilio:</label>
                            <input type="text" id="txtDomicilio" name="txtDomicilio" 
                                    class="form-control" placeholder="Domicilio"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtTelefono">Teléfono:</label>
                            <input type="text" id="txtTelefono" name="txtTelefono" 
                                    class="form-control" placeholder="Teléfono Fijo"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtCelular">Celular:</label>
                            <input type="text" id="txtCelular" name="txtCelular" 
                                    class="form-control" placeholder="Celular"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtFechaNacimiento">Fecha Nacimiento:</label>
                            <input type="text" id="txtFechaNacimiento" name="txtFechaNacimiento" 
                                    class="form-control datepicker" placeholder="dd/mm/aaaa"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtRfc">RFC:</label>
                            <input type="text" id="txtRfc" name="txtRfc" 
                                    class="form-control" placeholder="RFC"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtCurp">CURP:</label>
                            <input type="text" id="txtCurp" name="txtCurp" 
                                    class="form-control" placeholder="CURP"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtEmail">Correo electrónico:</label>
                            <input type="email" id="txtEmailUs" name="txtEmailUs" 
                                    class="form-control" placeholder="Correo electrónico"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtPassword">Contraseña:</label>
                            <input type="password" id="txtPasswordUs" name="txtPasswordUs" 
                                    class="form-control" placeholder="Contraseña"/>
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