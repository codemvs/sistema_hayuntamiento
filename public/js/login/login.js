var Login = Login || {
    
    init: function(){
        Login.btnIniciarSesion();
        Login.btnAbrirModalRegistroUsuario();
        Login.btnRegistrarUsuario();
        Login.inicarControles();
    },
    inicarControles: function(){     
        // Eliminar    
        $('#txtEmail').val('popeye@marino.soy'); 
        $('#txtPassword').val('123');
        
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
            console.log(usuraio)

            $.post('../myapplication/login/createUsuario',usuraio)
                .then(res=> swal.fire('Se agrego correctamente'))
                .catch((err,err1, err2)=>console.log(err, err1, err2))

        });
    },   
    
    // Servicios
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
