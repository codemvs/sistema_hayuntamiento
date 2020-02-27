var Login = Login || {
    
    init: function(){
        Login.btnIniciarSesion();
        Login.btnAbrirModalRegistroUsuario();
        Login.btnRegistrarUsuario();
        Login.inicarControles();
    },
    inicarControles: function(){     
        // Eliminar    
        
        
    },
    // Events
    btnIniciarSesion: function(){
        $('#btnIniciarSesion').click((e)=>{
            e.preventDefault();
            
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
            $('#modRegistroUsuario').modal();
        });        
    },
    btnRegistrarUsuario:function(){
        $('#btnRegistroUsuario').click((e)=>{
            e.preventDefault();
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
    }
    
};
