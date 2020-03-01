var Computadoras = Computadoras || {
    init: ()=>{
        Computadoras.cargarTablaComputadoras();
        Computadoras.clickAccionEditar();
        Computadoras.clickBtnCrearActualizarComputadora();
        Computadoras.clickAccionEliminar();
    },
    cargarTablaComputadoras:()=>{
        Computadoras.sGetComputadoras().then((res)=>{
            var table = $('#tbComputadoras').DataTable( {
                destroy:true,
                data:res,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [1,2,3,4,5,6,7,8,9,10]
                        } 
                    }, 
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        customize: function(doc) {
                            doc.content[1].margin = [ 100, 0, 100, 0 ] //left, top, right, bottom
                        },
                        exportOptions: {
                            columns: [1,2,3,4,5,6,7,8,9,10]
                        }
                    }
                ],
                columns:[
                    {title:'ID',data:'idComputadora'},
                    {title:'No. Inventario',data:'numeroInventario'},
                    {title:'Descripción',data:'descripcion'},
                    {title:'Valor Factura',data:'valorFactura'},
                    {title:'Valor Actual',data:'valorActual'},
                    {title:'Marca',data:'marca'},
                    {title:'Modelo',data:'modelo'},
                    {title:'Molor',data:'color'},
                    {title:'Área Adscripción',data:'areaAdscripcion'},
                    {title:'Fecha Adquisición',data:'fechaAdquisicion'},
                    {title:'Condiciones',data:'condiciones'},
                    // {title:'fotografia',data:'fotografia'},
                    {title:'Acciones', data:'', render: ()=>{
                        return `<div class="text-center">
                                    <span class="accionEditar pointer text-primary"
                                         title="Seleccionar" style="margin-right: 5px;">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </span>
                                    <span class="accionEliminar pointer text-danger" title="Eliminar">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </span>
                                </div>`;
                    }}
                ],
                fixedColumns:   {
                    leftColumns: 2,
                    rightColumns:1
                },
                scrollY:        "300px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
            } );
        });
    },
    clickAccionEditar:() => {
        $(document).on('click','.accionEditar',function(){
            var tr = $(this).closest('tr');
            var data = $('#tbComputadoras').DataTable().rows(tr).data()[0];

            $('#txt_idComputadora').val(data.idComputadora);
            $('#txt_numeroInventario').val(data.numeroInventario);
            $('#txt_descripcion').val(data.descripcion);
            $('#txt_valorFactura').val(data.valorFactura);
            $('#txt_valorActual').val(data.valorActual);
            $('#txt_marca').val(data.marca);
            $('#txt_modelo').val(data.modelo);
            $('#txt_color').val(data.color);
            $('#txt_areaAdscripcion').val(data.areaAdscripcion);
            $('#txt_fechaAdquisicion').val(data.fechaAdquisicion);
            $('#txt_condiciones').val(data.condiciones);
            $('#txt_fotografia').val(data.fotografia);            

            $('#aceptarComputadora').focus();
        });
    },
    clickAccionEliminar: ()=>{        
        $(document).on('click','.accionEliminar',function(){
            var tr = $(this).closest('tr');
            var data = $('#tbComputadoras').DataTable().rows(tr).data()[0];

            
            var dataDelete = {
                idComputadora : data.idComputadora
            };
            
              Swal.fire({
                title: 'Alerta',
                text: "¿Esta seguro que desea eliminar el registro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
              }).then((result) => {
                if (result.value) {
                  Computadoras.sDeleteComputadora(dataDelete).then(res=>{
                    Computadoras.cargarTablaComputadoras();
                  });
                }
              })
            
        });
    },
    clickBtnCrearActualizarComputadora: () => {
        Computadoras.validateComputadora();
        $('#frmComputadoras').submit((e)=>{
            e.preventDefault();
            var frmValid = $('#frmComputadoras').valid();
            if(!frmValid) return false;
            var data ={
                idComputadora:$('#txt_idComputadora').val().trim(),
                numeroInventario:$('#txt_numeroInventario').val().trim(),
                descripcion:$('#txt_descripcion').val().trim(),
                valorFactura:$('#txt_valorFactura').val().trim(),
                valorActual:$('#txt_valorActual').val().trim(),
                marca:$('#txt_marca').val().trim(),
                modelo:$('#txt_modelo').val().trim(),
                color:$('#txt_color').val().trim(),
                areaAdscripcion:$('#txt_areaAdscripcion').val().trim(),
                fechaAdquisicion:$('#txt_fechaAdquisicion').val().trim(),
                condiciones:$('#txt_condiciones').val().trim(),
                // fotografia:$('#txt_fotografia').val().trim()
            }
            
           if(data.idComputadora == ""){
               // Crear nuevo registro
                Computadoras.sCreateComputadora(data).then(res=>{
                    Computadoras.limpiarFormularioComputadora();
                    Computadoras.cargarTablaComputadoras();
                });
           }else{
               // Actualizar
               Computadoras.sUpdateComputadora(data).then(res=>{
                Computadoras.limpiarFormularioComputadora();
                Computadoras.cargarTablaComputadoras();
               });
           }
            
            console.log(data);
            //Computadoras.sCreateComputadora();


        });
    },
    validateComputadora: ()=>{
        $('#frmComputadoras').validate({
            rules:{
                txt_numeroInventario:{
                    required: true,
                    minlength: 2,
                    number: true
                },
                txt_descripcion:{
                    required: true,
                    minlength: 2                    
                },
                txt_valorFactura:{
                    required: true,
                    minlength: 2,
                    number:true
                },
                txt_valorActual:{
                    required: true,
                    minlength: 2,
                    number:true
                },
                txt_marca:{
                    required: true,
                    minlength: 2
                },
                txt_modelo:{
                    required: true,
                    minlength: 2
                },
                txt_color:{
                    required: true,
                    minlength: 2
                },
                txt_areaAdscripcion:{
                    required: true,
                    minlength: 2
                },
                txt_fechaAdquisicion:{
                    required: true,
                    minlength: 2
                },
                txt_condiciones:{
                    required: true,
                    minlength: 2
                },
            }
        });
    },
    limpiarFormularioComputadora: () =>{
        $('#txt_idComputadora').val("");
        $('#frmComputadoras label.error').remove();
        $('#frmComputadoras')[0].reset();
    },
        // Servicios
    sGetComputadoras: () =>{
        var $d = $.Deferred();
        Utils.post(base+'computadora/getComputadoras').then((res)=>{
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sCreateComputadora: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/computadora/createComputadora', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se agregó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');            
            $d.reject();
        });
        return $d.promise();
    },
    sUpdateComputadora: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/computadora/updateComputadora', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se actualizó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sDeleteComputadora: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/computadora/deleteComputadora', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se eliminó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },

}