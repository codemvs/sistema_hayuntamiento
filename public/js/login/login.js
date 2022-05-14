var Login = Login || {
    
    init: function(){
        Login.btnIniciarSesion();
        Login.btnAbrirModalRegistroUsuario();
        Login.btnRegistrarUsuario();
        Login.inicarControles();
    },
    inicarControles: function(){     
        Login.btnAbrirModalRecupearContrasenia();
        Login.btnRecuperarContrasnia();
        
    },
    // Events
    btnIniciarSesion: function(){
        Login.validateLogin();
        $('#frmLogin').submit((e)=>{
            e.preventDefault();
            var isFormValid = $('#frmLogin').valid();
            if(!isFormValid)return false;
            var dataLogin = {
                email: $('#txtEmail').val().trim(),
                contrasenia:$('#txtPassword').val().trim()
            };
            Login.sIniciarSesion(dataLogin).then(usuario=>{              

                localStorage.setItem('usuario', JSON.stringify(usuario));
                location = base;
                
            });
        });
    },
    btnAbrirModalRegistroUsuario:function(){
        $('#abrirModalCrearCuenta').click(()=>{
            $('#frmRegistroUsuario')[0].reset();
            $('#frmRegistroUsuario label.error').remove();
            $('#modRegistroUsuario').modal();
        });        
    },
    btnAbrirModalRecupearContrasenia:function(){
        $('#abrirModalRecuperarContrasenia').click(()=>{
            $('#frmActualizarContrasenia')[0].reset();
            $('#frmActualizarContrasenia label.error').remove();
            $('#modRecuperarContrasenia').modal();
        });
    },
    btnRecuperarContrasnia:function(){
        Login.validateRecupearContrasnia();
        $('#frmActualizarContrasenia').submit((e)=>{            
            e.preventDefault();
            var frmIsValid = $('#frmActualizarContrasenia').valid();
            if(!frmIsValid) return false;
            var usuraio = {                
                email:$('#txtCorreo').val().trim(),
                password:$('#txtPasswordC').val().trim(),
                password2:$('#txtPassword2').val().trim()                
            };
            
            Login.sRecuperarContrasenia(usuraio).then((res)=>{
                if(res == 0){
                    Swal.fire('Ocurrio un error',`No se pudo actualizar la contraseña, verifica que el correo sea válido`,'error');
                    return;
                }
                Swal.fire('Transacción exitosa',`Se acutalizo la contraseña con éxito`,'success');
                $('#modRecuperarContrasenia').modal('hide');
                
            });

        });
    },
    btnRegistrarUsuario:function(){   
        Login.validateRegistrarUsuario();
        $('#frmRegistroUsuario').submit((e)=>{            
            e.preventDefault();
            var frmIsValid = $('#frmRegistroUsuario').valid();
            if(!frmIsValid) return false;
            var usuraio = {                
                nombre:$('#txtNombre').val().trim(),
                apellidos:$('#txtApellidos').val().trim(),
                domicilio:$('#txtDomicilio').val().trim(),
                telefono:$('#txtTelefono').val().trim(),
                celular:$('#txtCelular').val().trim(),
                fechaNacimiento:$('#txtFechaNacimiento').val().trim(),
                rfc:$('#txtRfc').val().trim(),
                curp:$('#txtCurp').val().trim(),
                email:$('#txtEmailUs').val().trim(),
                contrasenia:$('#txtPasswordUs').val().trim()
            };
            
            Login.sRegistrarUsuario(usuraio).then(()=>{
                let usuario = $('#txtEmailUs').val().trim();
                $('#modRegistroUsuario').modal('hide');
                Swal.fire('Transacción exitosa',`Usuario creado ${usuario}`,'success');
            });

        });
    },   
    validateRecupearContrasnia: function(){
        $('#frmActualizarContrasenia').validate({            
            rules: {
                
                txtCorreo:{
                    required: true,
                    email: true
                },
                txtPasswordC:{
                    required: true,
                    minlength: 3
                },
                txtPassword2:{
                    equalTo:txtPasswordC
                }
              },
              messages:{
                txtPassword2: 'La contraseña no coincide'
              }
        });
    },
    validateRegistrarUsuario: function(){
                
        $('#frmRegistroUsuario').validate({            
            rules: {
                txtNombre: {
                  required: true,
                  minlength:2              
                },
                txtApellidos:{
                    required: true,
                    minlength:2
                },
                txtDomicilio:{
                    required: true,
                    minlength:2
                },
                txtTelefono:{
                    required: true,
                    minlength:10,
                    maxlength: 10,
                    number: true,
                },
                txtCelular: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    number: true
                },
                txtFechaNacimiento:{
                    required: true                    
                },
                txtRfc:{
                    required: true,
                    minlength: 13,
                    maxlength: 13
                },
                txtCurp: {
                    required: true,
                    minlength: 18,
                    maxlength: 18
                },
                txtEmailUs:{
                    required: true,
                    email: true
                },
                txtPasswordUs:{
                    required: true,
                    minlength: 3
                },
                txtConfirmPassUs:{
                    equalTo:txtPasswordUs
                }
              },
              messages:{
                txtConfirmPassUs: 'La contraseña no coincide'
              }
        });
        
    },
    validateLogin: function(){
        $('#frmLogin').validate({
            rules:{
                txtEmail:{
                    required: true
                },
                txtPassword: {
                    required: true
                } 

            }
        });
    },
    // Servicios
    sRegistrarUsuario: function(usuario) {
        var $d = $.Deferred();
        Utils.post(base+'login/createUsuario', usuario).then((res)=>{
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sIniciarSesion: function(dataLogin) {
        var $d = $.Deferred();
        Utils.post(base+'login/iniciarSesion', dataLogin).then((res)=>{
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sRecuperarContrasenia: function(data) {
        var $d = $.Deferred();
        Utils.post(base+'login/recuperarContrasenia', data).then((res)=>{
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    }
    
};
