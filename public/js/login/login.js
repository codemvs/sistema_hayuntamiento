var Login = Login || {
    init: function(){
        Login.btnIniciarSesion();
        Login.btnAbrirModalRegistroUsuario();
        Login.btnRegistrarUsuario();
        Login.inicarControles();
    },
    inicarControles: function(){
        $('#txtFechaNacimiento').datetimepicker({
            locale: 'es'
        });
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
            procesando();
            //swal.fire('prueba');
        });
    },
};