var Otros = Otros || {
    init: ()=>{
        Otros.cargarTablaOtros();
        Otros.clickAccionEditar();
        Otros.clickBtnCrearActualizarOtros();
        Otros.clickAccionEliminar();
        
    },
    cargarTablaOtros:()=>{
        let imgBase64 ='';
        Utils.convertirImagenABase64(base+'public/img/logo.jpg').then(res => imgBase64=res);
        Otros.sGetOtros().then((res)=>{
            $('#tbOtros').DataTable( {
                destroy:true,
                data:res,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
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
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11]
                        }
                    }
                ],
                columns:[
                    {title:'Id', data:'idOtros'},
                    {title:'No. Inventario', data:'numeroInventario'},
                    {title:'Nombre', data:'nombre'},
                    {title:'Marca', data:'marca'},
                    {title:'Precio', data:'precio'},
                    {title:'Condiciones', data:'condiciones'},
                    {title:'Color', data:'color'},
                    {title:'Modelo', data:'modelo'},
                    {title:'No Piezas', data:'noPiezas'},
                    {title:'Area Adscripción', data:'areaAdscripcion'},
                    {title:'Fecha Adquisición', data:'fechaAdquisicion'},
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
                initComplete:function(){
                    Utils.renderStyleBootstrapExportButtons();
                }
            } );
        });
    },
    clickAccionEditar:() => {
        $(document).on('click','.accionEditar',function(){
            var tr = $(this).closest('tr');
            var data = $('#tbOtros').DataTable().rows(tr).data()[0];

            $('#txt_idOtros').val(data.idOtros);
            $('#txt_numeroInventario').val(data.numeroInventario);
            $('#txt_nombre').val(data.nombre);
            $('#txt_marca').val(data.marca);
            $('#txt_precio').val(data.precio);
            $('#txt_condiciones').val(data.condiciones);
            $('#txt_color').val(data.color);
            $('#txt_modelo').val(data.modelo);
            $('#txt_noPiezas').val(data.noPiezas);
            $('#txt_areaAdscripcion').val(data.areaAdscripcion);
            $('#txt_fechaAdquisicion').val(data.fechaAdquisicion);       

            $('#aceptarOtros').focus();
        });
    },
    clickAccionEliminar: ()=>{        
        $(document).on('click','.accionEliminar',function(){
            var tr = $(this).closest('tr');
            var data = $('#tbOtros').DataTable().rows(tr).data()[0];

            
            var dataDelete = {
                idOtros : data.idOtros
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
                  Otros.sDeleteOtros(dataDelete).then(res=>Otros.cargarTablaOtros());
                }
              })
            
        });
    },
    clickBtnCrearActualizarOtros: () => {
        Otros.validateOtros();
        $('#frmOtros').submit((e)=>{
            e.preventDefault();
            var frmValidOtros = $('#frmOtros').valid();
            if(!frmValidOtros) return false;
            var data = {
                idOtros:$('#txt_idOtros').val().trim(),
                numeroInventario:$('#txt_numeroInventario').val().trim(),
                nombre:$('#txt_nombre').val().trim(),
                marca:$('#txt_marca').val().trim(),
                precio:$('#txt_precio').val().trim(),
                condiciones:$('#txt_condiciones').val().trim(),
                color:$('#txt_color').val().trim(),
                modelo:$('#txt_modelo').val().trim(),
                noPiezas:$('#txt_noPiezas').val().trim(),
                areaAdscripcion:$('#txt_areaAdscripcion').val().trim(),
                fechaAdquisicion:$('#txt_fechaAdquisicion').val().trim(),
            }
            
           if(data.idOtros == ""){
               // Crear nuevo registro
                Otros.sCreateOtros(data).then(res=>{
                    Otros.limpiarFormularioOtros();
                    Otros.cargarTablaOtross();
                });
           }else{
               // Actualizar
               Otros.sUpdateOtros(data).then(res=>{
                Otros.limpiarFormularioOtros();
                Otros.cargarTablaOtross();
               });
           }
            
        });
    },
    validateOtros: ()=>{
        $('#frmOtros').validate({
            rules:{
                txt_numeroInventario:{
                    required: true,
                    minlength:1,
                    number: true
                },
                txt_nombre:{
                    required: true,
                    minlength:2
                },
                txt_marca:{
                    required: true,
                    minlength:2
                },
                txt_precio:{
                    required: true,
                    minlength:1,
                    number: true
                },
                txt_condiciones:{
                    required: true,
                    minlength:2
                },
                txt_color:{
                    required: true,
                    minlength:2
                },
                txt_modelo:{
                    required: true,
                    minlength:2
                },
                txt_noPiezas:{
                    required: true,
                    minlength:1,
                    number: true
                },
                txt_areaAdscripcion:{
                    required: true,
                    minlength:2
                },
                txt_fechaAdquisicion:{
                    required: true,
                    minlength:2
                }
            }
        });
    },
    limpiarFormularioOtros: () =>{
        $('#txt_idOtros').val("");
        $('#frmOtros')[0].reset();
        $('#frmOtros label.error').remove();
    },
        // Servicios
    sGetOtros: () =>{
        var $d = $.Deferred();
        Utils.post(base+'otros/getOtros').then((res)=>{
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sCreateOtros: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/otros/createOtros', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se agregó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');            
            $d.reject();
        });
        return $d.promise();
    },
    sUpdateOtros: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/otros/updateOtros', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se actualizó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sDeleteOtros: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/otros/deleteOtros', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se eliminó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },

}