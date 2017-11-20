@extends('layouts.init')

@section('FormularioTitulo','Proyectos a Evaluar')
@section('FormularioDescripcion','en este formulario se pueden observar todos los proyectos a evaluar')
@section('FormularioActual','Proyectos a evaluar')
@section('FormularioDetalle','Proyectos')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <div class="form-group">
        {!! Form::open(['route' => 'listar.store', 'method' => 'post', 'id' => 'formNuevo']) !!}
        <span class="hint--top  hint--info" aria-label="Registrar Nueva Solicitud"><button type="buttom" class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" id='nuevaSolicitud'><i class="fa fa-plus"></i> Nueva Solicitud</button></span>
        {!! Form::close() !!}
    </div>
    <input name="_tokenGeneral" value="{{ csrf_token() }}" type="hidden"/>
    <?php $cont=1; ?>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Acción</th>
                <th style="text-align: center !important;">Código</th>
                <th style="text-align: center !important;">Proyecto</th>
                <th style="text-align: center !important;">Entidad (UE)</th>
                <th style="text-align: center !important;">Ciudad</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitud as $item)
            <tr>
                <td>{{ $cont++ }}</td>
                <td class="text-center">
                    @if($item->sol_estado=='VERIFICACION')
                        <span class="hint--top  hint--warning" aria-label="Actualizar Solicitud"><a class="btn btn-warning"><i class="fa fa-edit"></i></a></span>
                    @endif
                    @if($item->sol_estado=='DEVUELTO')
                        <span class="hint--top  hint--error" aria-label="La Solicitud Fue Devuelta"><button class="btn btn-danger">Sin Acción</button></span>
                    @endif
                    @if($item->sol_estado=='POR APROBAR')
                        <span class="hint--top  hint--info" aria-label="La Solicitud se encuentra en proceso de Aprobación"><button class="btn btn-primary">Sin Acción</button></span>
                    @endif
                </td>
                <td>{{ $item->sol_codigo }}</td>
                <td>{{ $item->sol_nombre }}</td>
                <td>{{ $item->entidad->ent_nombre. ' - '.$item->sol_sigla }}</td>
                <td>{{ $item->departamento->dep_descripcion }}</td> 
                <td class="text-center">
                    @if($item->sol_estado=='VERIFICACION')
                        <button class="btn btn-warning">{{ $item->sol_estado }}</button>
                    @endif
                    @if($item->sol_estado=='DEVUELTO')
                        <button class="btn btn-danger">{{ $item->sol_estado }}</button>
                    @endif
                    @if($item->sol_estado=='POR APROBAR')
                        <button class="btn btn-primary">{{ $item->sol_estado }}</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

@section('javascript')
    <script src="{{ asset('plugins/lte/datatables/responsive/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
            $('#nuevaSolicitud').click(function(e){
                e.preventDefault();
                $('#btnSI').click(function(eve){
                    $("#modalNuevo").modal('hide');
                    $('#formNuevo').submit();
                });
            });
        });

        function aprobacion(solicitudID){
            $("#btnAprobacion").click(function(e){
                $("#modalAprobacion").modal("hide");
                $.ajax({
                    type: 'POST',
                    url: '/postEstado',
                    dataType: 'json',
                    data:{'idSolicitud':solicitudID},
                    success: function (data) {
                        console.log(data);
                    },
                    error: function (data) {
                        var errors = data.responseJSON;
                        if (errors) {
                            $.each(errors, function (i) {
                                console.log(errors[i]);
                            });
                        }
                    }
                });
            });
        }
    </script>
    <!--Modal para registrar una nueva solicitud y generar cite-->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Advertencia</h4>
                </div>
                <div class="modal-body">
                    Al presionar <b>SI</b> se generara un Cite para la nueva solicitud el cual no se podra actualizar,
                    <br><b>¿ Está seguro de registrar una nueva solicitud ?</b>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="btnSI">SI</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>

    <!--Modal para solicitar aprobacion-->
    <div class="modal fade" id="modalAprobacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Advertencia</h4>
                </div>
                <div class="modal-body">
                    Al presionar <b>SI</b> estará solicitando la aprobación del proyecto,
                    <br><b>¿ Está seguro de solicituar la Aprobación del Proyecto ?</b>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnAprobacion">SI</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
@endsection