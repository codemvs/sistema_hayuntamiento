
// Preloader
function procesando(){
    $.blockUI({
        message:'Procesando...',
        css:{ 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff',
            zIndex:9999
        }
    });
};

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',            
    locale: 'es'
});
 