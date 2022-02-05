var Vehiculo = Vehiculo || {
    init: ()=>{
        Vehiculo.cargarTablaVehiculos();
        Vehiculo.clickAccionEditar();
        Vehiculo.clickBtnCrearActualizarVehiculo();
        Vehiculo.clickAccionEliminar();
        
    },
    cargarTablaVehiculos:()=>{
        let imgBase64 ='';
        Utils.convertirImagenABase64(base+'public/img/logo.jpg').then(res => imgBase64=res);
        Vehiculo.sGetVehiculos().then((res)=>{
            $('#tbVehiculo').DataTable( {
                destroy:true,
                data:res,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
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
                            columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]
                        }
                    }
                ],
                columns:[
                    {title:'Id',data:'idVehiculo'},
                    {title:'No. Inventario',data:'numeroInventario'},
                    {title:'No. Serie',data:'numeroSerie'},
                    {title:'Marca',data:'marca'},
                    {title:'Modelo',data:'mdelo'},
                    {title:'Molor',data:'color'},
                    {title:'Línea',data:'linea'},
                    {title:'No. Motor',data:'numeroMotor'},
                    {title:'Placa',data:'placa'},
                    {title:'Área Adscripcion',data:'areaAdscripcion'},
                    {title:'Condicion Vehículo',data:'condicionVehiculo'},
                    {title:'Fecha Adquisición',data:'fechaAquisicion'},
                    {title:'Observación',data:'observacion'},
                    {title:'Descripción',data:'descripcion'},
                    {title:'Valor Actual',data:'valorActual'},
                    {title:'Valor Factura',data:'valorFactura'},                   
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
                initComplete:function(){
                    Utils.renderStyleBootstrapExportButtons();
                }
            } );
        });
    },
    clickAccionEditar:() => {
        $(document).on('click','.accionEditar',function(){
            var tr = $(this).closest('tr');
            var data = $('#tbVehiculo').DataTable().rows(tr).data()[0];

            $('#txt_idVehiculo').val(data.idVehiculo);
            $('#txt_numeroInventario').val(data.numeroInventario);
            $('#txt_numeroSerie').val(data.numeroSerie);
            $('#txt_marca').val(data.marca);
            $('#txt_mdelo').val(data.mdelo);
            $('#txt_color').val(data.color);
            $('#txt_linea').val(data.linea);
            $('#txt_numeroMotor').val(data.numeroMotor);
            $('#txt_placa').val(data.placa);
            $('#txt_areaAdscripcion').val(data.areaAdscripcion);
            $('#txt_condicionVehiculo').val(data.condicionVehiculo);
            $('#txt_fechaAquisicion').val(data.fechaAquisicion);
            $('#txt_observacion').val(data.observacion);
            $('#txt_descripcion').val(data.descripcion);
            $('#txt_valorActual').val(data.valorActual);
            $('#txt_valorFactura').val(data.valorFactura);          

            $('#aceptarVehiculo').focus();
        });
    },
    clickAccionEliminar: ()=>{        
        $(document).on('click','.accionEliminar',function(){
            var tr = $(this).closest('tr');
            var data = $('#tbVehiculo').DataTable().rows(tr).data()[0];

            
            var dataDelete = {
                idVehiculo : data.idVehiculo
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
                  Vehiculo.sDeleteVehiculo(dataDelete).then(res=>Vehiculo.cargarTablaVehiculos());
                }
              })
            
        });
    },
    clickBtnCrearActualizarVehiculo: () => {
        Vehiculo.validateVehiculo();
        $('#frmVehiculo').submit((e)=>{
            e.preventDefault();
            var frmValidVehiculo = $('#frmVehiculo').valid();
            if(!frmValidVehiculo) return false;
            var data = {
                idVehiculo:$('#txt_idVehiculo').val().trim(),
                numeroInventario:$('#txt_numeroInventario').val().trim(),
                numeroSerie:$('#txt_numeroSerie').val().trim(),
                marca:$('#txt_marca').val().trim(),
                mdelo:$('#txt_mdelo').val().trim(),
                color:$('#txt_color').val().trim(),
                linea:$('#txt_linea').val().trim(),
                numeroMotor:$('#txt_numeroMotor').val().trim(),
                placa:$('#txt_placa').val().trim(),
                areaAdscripcion:$('#txt_areaAdscripcion').val().trim(),
                condicionVehiculo:$('#txt_condicionVehiculo').val().trim(),
                fechaAquisicion:$('#txt_fechaAquisicion').val().trim(),
                observacion:$('#txt_observacion').val().trim(),
                descripcion:$('#txt_descripcion').val().trim(),
                valorActual:$('#txt_valorActual').val().trim(),
                valorFactura:$('#txt_valorFactura').val().trim(),
                // fotografia:$('#txt_fotografia').val().trim()
            }
            
           if(data.idVehiculo == ""){
               // Crear nuevo registro
                Vehiculo.sCreateVehiculo(data).then(res=>{
                    Vehiculo.limpiarFormularioVehiculo();
                    Vehiculo.cargarTablaVehiculos();
                });
           }else{
               // Actualizar
               Vehiculo.sUpdateVehiculo(data).then(res=>{
                Vehiculo.limpiarFormularioVehiculo();
                Vehiculo.cargarTablaVehiculos();
               });
           }
            
        });
    },
    validateVehiculo: ()=>{
        $('#frmVehiculo').validate({
            rules:{
                txt_numeroInventario:{
                    required: true,
                    minlength: 1,
                    number: true
                },
                txt_numeroSerie:{
                    required: true,
                    minlength: 1,
                    number: true
                },
                txt_marca:{
                    required: true,
                    minlength: 2
                },
                txt_mdelo:{
                    required: true,
                    minlength: 2
                },
                txt_color:{
                    required: true,
                    minlength: 2
                },
                txt_linea:{
                    required: true,
                    minlength: 2
                },
                txt_numeroMotor:{
                    required: true,
                    minlength: 2
                },
                txt_placa:{
                    required: true,
                    minlength: 2
                },
                txt_areaAdscripcion:{
                    required: true,
                    minlength: 2
                },
                txt_condicionVehiculo:{
                    required: true,
                    minlength: 2
                },
                txt_fechaAquisicion:{
                    required: true,
                    minlength: 2
                },
                txt_observacion:{
                    required: true,
                    minlength: 2
                },
                txt_descripcion:{
                    required: true,
                    minlength: 2
                },
                txt_valorActual:{
                    required: true,
                    minlength: 2,
                    number: true,
                },
                txt_valorFactura:{
                    required: true,
                    minlength: 2,
                    number: true
                },
                
            }
        });
    },
    limpiarFormularioVehiculo: () =>{
        $('#txt_idVehiculo').val("");
        $('#frmVehiculo')[0].reset();
        $('#frmVehiculo label.error').remove();
    },
        // Servicios
    sGetVehiculos: () =>{
        var $d = $.Deferred();
        Utils.post(base+'vehiculo/getVehiculos').then((res)=>{
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sCreateVehiculo: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/vehiculo/createVehiculo', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se agregó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');            
            $d.reject();
        });
        return $d.promise();
    },
    sUpdateVehiculo: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/Vehiculo/updateVehiculo', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se actualizó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },
    sDeleteVehiculo: (data)=>{        
        var $d = $.Deferred();
        Utils.post(base+'/Vehiculo/deleteVehiculo', data).then((res)=>{
            Swal.fire('Transacción exitosa','Se eliminó correctamente','success');
            $d.resolve(res);
        }).fail((err)=>{
            Swal.fire('Ocurrió un error',err.message,'error');
            $d.reject();
        });
        return $d.promise();
    },

}