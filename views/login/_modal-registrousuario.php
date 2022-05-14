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
                                    class="form-control txtmayusc-letter-number" placeholder="Nombre" autofocus/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtApellidos">Apellidos:</label>
                            <input type="text" id="txtApellidos" name="txtApellidos" 
                                    class="form-control txtmayusc-letter-number" placeholder="Apellidos"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtDomicilio">Domicilio:</label>
                            <input type="text" id="txtDomicilio" name="txtDomicilio" 
                                    class="form-control txtmayusc" placeholder="Domicilio"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtTelefono">Teléfono:</label>
                            <input type="text" id="txtTelefono" name="txtTelefono" 
                                    class="form-control onlynumber" placeholder="Teléfono Fijo"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtCelular">Celular:</label>
                            <input type="text" id="txtCelular" name="txtCelular" 
                                    class="form-control onlynumber" placeholder="Celular"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtFechaNacimiento">Fecha Nacimiento:</label>
                            <input type="text" id="txtFechaNacimiento" name="txtFechaNacimiento" 
                                    class="form-control datepicker" placeholder="dd/mm/aaaa" readonly/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtRfc">RFC:</label>
                            <input type="text" id="txtRfc" name="txtRfc" 
                                    class="form-control txtmayusc" placeholder="RFC"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtCurp">CURP:</label>
                            <input type="text" id="txtCurp" name="txtCurp" 
                                    class="form-control txtmayusc" placeholder="CURP"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtEmail">Correo electrónico:</label>
                            <input type="email" id="txtEmailUs" name="txtEmailUs" 
                                    class="form-control txtmayusc" placeholder="Correo electrónico"/>
                        </div>

                        <div class="col-sm-4 form-group">
                            <label for="txtPasswordUs">Contraseña:</label>
                            <input type="password" id="txtPasswordUs" name="txtPasswordUs" 
                                    class="form-control" placeholder="Contraseña"/>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="txtConfirmPassUs">Confirmar Contraseña:</label>
                            <input type="password" id="txtConfirmPassUs" name="txtConfirmPassUs" 
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

    <!--
    =========================================================
                     Ventana Modal Recuperar Contraseña
    =========================================================
    -->    
<div class="modal" id="modRecuperarContrasenia">
        <div class="modal-dialog modal-lg">
            <form id="frmActualizarContrasenia">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Recuperar Contraseña</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">

                        <div class="col-sm-4 form-group">
                            <label for="txtCorreo">Correo:</label>
                            <input type="text" id="txtCorreo" name="txtCorreo" 
                                    class="form-control txtmayusc" placeholder="Correo" autofocus/>
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="txtPasswordC">Nueva Contraseña:</label>
                            <input type="password" id="txtPasswordC" name="txtPasswordC" 
                                    class="form-control" placeholder="Contraseña" autofocus/>
                        </div>
                        
                        <div class="col-sm-4 form-group">
                            <label for="txtPassword2">Confirmar Contraseña:</label>
                            <input type="password" id="txtPassword2" name="txtPassword2" 
                                    class="form-control" placeholder="Confirmar Contraseña" autofocus/>
                        </div>

                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnRecuperarContrasenia" class="btn btn-primary">Aceptar</button>
                </div>
            </form>
            </div>
        </div>
    </div>