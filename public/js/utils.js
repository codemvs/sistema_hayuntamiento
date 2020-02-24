

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',            
    locale: 'es'
});
var base = $('#baseUrl').attr('href');
var Utils = Utils || {
    procesando: function(){
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
    },
    post: function(url, data){
        data = data || {};
        Utils.procesando();
        var $d = $.Deferred();
        $.ajax({
            method:'POST',
            url: url,
            data:data,
            type:'json',
            success: function(res) {
                res = res || "";
                if(res.length>0){ 
                    res = JSON.parse(res);
                }
                $d.resolve(res);
            },
            error: function(err) {                
                var dataError = {
                    status: err.status,
                    message: err.responseText,
                    code: err.statusText
                }                
                $d.reject(dataError);
            },
            complete: function(){
                $.unblockUI();
            }
        });       
        return $d.promise();
    },
    sLogOut: ()=>{
        Utils.post('../myapplication/login/cerrarSesion').then((res)=>{            
        });
    }
}
 