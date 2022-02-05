var base = $('#baseUrl').attr('href');

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',            
    locale: 'es'
});

jQuery.extend(jQuery.validator.messages, {
    required: "Este campo es requerido.",    
    email: "Se requiere un correo válido.",  
    date: "Se requiere una fecha válido.",
    dateISO: "Se requiere una fecha válido (ISO).",      
    number: "Ingrese un número valido.",
    digits: "Ingrese solo dígitos.",    
    accept: "Agregue un archivo válido",
    maxlength: jQuery.validator.format("Ingese no mas de {0} caracteres."),
    minlength: jQuery.validator.format("Ingrese al menos {0} caracteres."),
    rangelength: jQuery.validator.format("Ingrese un valor entre {0} y {1} caracteres."),
    range: jQuery.validator.format("Ingrese un valor entre {0} y {1}."),
    max: jQuery.validator.format("Ingrese un valor menor o igual a {0}."),
    min: jQuery.validator.format("Ingrese un valor mayor o igual a {0}.")    
});


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
    renderStyleBootstrapExportButtons:()=>{
        $('.dataTables_wrapper>.dt-buttons>.dt-button').each(function(i){
            $(this).removeClass('btn btn-success').addClass('btn btn-success');
        });
    },
    convertirImagenABase64:(urlImg)=>{
        var $d = $.Deferred();
        try {
            var xhr = new XMLHttpRequest();
            xhr.onload = function() {
              var reader = new FileReader();
              reader.onloadend = function() {
                $d.resolve(reader.result);
              }
              reader.readAsDataURL(xhr.response);
            };
            xhr.open('GET', urlImg);
            xhr.responseType = 'blob';
            xhr.send();
        } catch (error) {
            $d.reject(error);
        }
            
          
          return $d.promise();
    },
    personalizarPDF: (doc,imgBase64)=>{
         
        doc.content[1].margin = [ 100, 0, 100, 0 ] //left, top, right, bottom
        doc.content.splice( 1, 0, {
            margin: [ 100, -60, 0, 10 ],
            alignment: 'left',
            image: imgBase64,
            width: 80,
            height: 80
        } );

       
        // Create a footer
        doc['footer']=(function(page, pages) {
            return {
                columns: [                                        
                    {
                        alignment:'center',
                        text: ['Lic. Fernando Tolentino Canuto',
                               '\n______________________________',
                        '\nContralor interno del H. Ayuntamiento de Tlachichilco, Ver.']
                    }
                    // {
                    //     // This is the right column
                    //     alignment: 'right',
                    //     text: ['page ', { text: page.toString() },  ' of ', { text: pages.toString() }]
                    // }
                ],
                margin: [10, 0]
            }
        });
        return doc;
    }
}
$('.txtmayusc').on('input',function(){
    let letter = this.value.toUpperCase();
    this.value = letter;
});
$('.txtmayusc-letter-number').on('input',function(){
    let letter = this.value.toUpperCase();
    this.value = letter.replace(/[^A-Z]/gi, '');    
});
$('.onlynumber').on('input',function(){
    let letter = this.value.toUpperCase();
    this.value = letter.replace(/[^0-9]/gi, '');    
});