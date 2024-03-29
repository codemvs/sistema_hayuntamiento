var Escritorio = Escritorio || {
    init: ()=>{
        Escritorio.cargarTablaEscritorios();
        Escritorio.clickAccionEditar();
        Escritorio.clickBtnCrearActualizarEscritorio();
        Escritorio.clickAccionEliminar();
        
    },
    cargarTablaEscritorios:()=>{
        let imgBase64 ='';
        Utils.convertirImagenABase64(base+'public/img/logo.jpg').then(res => imgBase64=res);
        Escritorio.sGetEscritorios().then((res)=>{
            $('#tbEscritorio').DataTable( {
                destroy:true,
                data:res,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        } 
                    }, 
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        customize: function(doc) {                            
                            Utils.personalizarPDF(doc,imgBase64);
                        },
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6]
                        }
                    }
                ],
                columns:[
                    {title:'Id',data:'idEscritorio'},
                    {title:'No. Inventario',data:'numeroInventario'},
                    {title:'Modelo',data:'modelo'},
                    {title:'Color',data:'color'},
                    {title:'Área Adscripción',data:'areaAdscripcion'},
                    {title:'Fecha Adquisición',data:'fechaAdquisicion'},
                    {title:'Observación',data:'observacion'},                    
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
                scrollY:        "300px",
                scrollX:        true,
                scrollCollapse: true,
                paging:         false,
                initComplete:function(){
                    Utils.renderStyleBootstrapExportButtons();
                }
            } );
        });
    },
    clickAccionEditar:() => {
        $(document).on('click','.accionEditar',function(){
            var tr = $(this).closest('tr');
            var data = $('#tbEscritorio').DataTable().rows(tr).data()[0];

            $('#txt_idEscritorio').val(data.idEscritorio);
            $('#txt_numeroInventario').val(data.numeroInventario);
            $('#txt_modelo').val(data.modelo);
            $('#txt_color').val(data.color);
            $('#txt_areaAdscripcion').val(data.areaAdscripcion);
            $('#txt_fechaAdquisicion').val(data.fechaAdquisicion);
            $('#txt_observacion').val(data.observacion);           

            $('#aceptarEscritorio').focus();
        });
    },
    clickAccionEliminar: ()=>{        
        $(document).on('click','.accionEliminar',function(){
            var tr = $(this).closest('tr');
            var data = $('#tbEscritorio').DataTable().rows(tr).data()[0];

            
            var dataDelete = {
                idEscritorio : data.idEscritorio
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
                  Escritorio.sDeleteEscritorio(dataDelete).then(res=>Escritorio.cargarTablaEscritorios());
                }
              })
            
        });
    },
    clickBtnCrearActualizarEscritorio: () => {
        Escritorio.validarEscritorio();
        $('#frmEscritorio').submit((e)=>{
            e.preventDefault();
            var frmEscritorioValido = $('#frmEscritorio').valid();
            if(!frmEscritorioValido)return false;
            var data ={
                idEscritorio: $('#txt_idEscritorio').val().trim(),
                numeroInventario: $('#txt_numeroInventario').val().trim(),
                modelo: $('#txt_modelo').val().trim(),
                color: $('#txt_color').val().trim(),
                areaAdscripcion: $('#txt_areaAdscripcion').val().trim(),
                fechaAdquisicion: $('#txt_fechaAdquisicion').val().trim(),
                observacion: $('#txt_observacion').val().trim(),
                // fotografia:$('#txt_fotografia').val().trim()
            }
            
           if(data.idEscritorio == ""){
               // Crear nuevo registro
                Escritorio.sCreateEscritorio(data).then(res=>{
                    Escritorio.limpiarFormularioEscritorio();
                    Escritorio.cargarTablaEscritorios();
                });
           }else{
               // Actualizar
               Escritorio.sUpdateEscritorio(data).then(res=>{
                Escritorio.limpiarFormularioEscritorio();
                Escritorio.cargarTablaEscritorios();
               });
           }
            
        });
    },
    validarEscritorio: ()=>{
        $('#frmEscritorio').validate({
            rules:{
                txt_numeroInventario:{
                    required: true,
                    minlength:2,
                    number: true
                },
                txt_modelo:{
                    required: true,
                    minlength:2
                },
                txt_color:{
                    required: true,
                    minlength:2
                },
                txt_areaAdscripcion:{
                    required: true,
                    minlength:2
                },
                txt_fechaAdquisicion:{
                    required: true,
                    minlength:2
                },
                txt_observacion:{
                    required: true,
                    minlength:2
                },
            }
        });
    },
    limpiarFormularioEscritorio: () =>{
        $('#txt_idEscritorio').val("");
        $('#frmEscritorio')[0].reset();
        $('#frmEscritorio label.error').remove();
    },
        // Servicios
    sGetEscritorios: () =>{
        var $d = $.Deferred();
        Utils.post(base+'escritorio/getEscritorios').then((res)=>{
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sCreateEscritorio: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/escritorio/createEscritorio', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se agregó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');            
            $d.reject();
        });
        return $d.promise();
    },
    sUpdateEscritorio: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/escritorio/updateEscritorio', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se actualizó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sDeleteEscritorio: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/escritorio/deleteEscritorio', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se eliminó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },

}