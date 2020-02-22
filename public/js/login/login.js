var Login = Login || {
    init: function(){
        Login.btnIniciarSesion();
        Login.btnAbrirModalRegistroUsuario();
        Login.btnRegistrarUsuario();
        Login.inicarControles();
    },
    inicarControles: function(){        
        
    },
    // Events
    btnIniciarSesion: function(){
        $('#btnIniciarSesion').click((e)=>{
            e.preventDefault();
            alert(1);
        });
    },
    btnAbrirModalRegistroUsuario:function(){
        $('#abrirModalCrearCuenta').click(()=>{
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
};
