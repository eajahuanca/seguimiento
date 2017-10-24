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
    <table id="example" class="table table-striped table-bordered tblSigec" cellspacing="0" width="100%">
        <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">Opción</th>
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
                <td class="text-center">
                    @if($item->sol_estado=='TRANSCRIPCION')
                        <span class="hint--top  hint--warning" aria-label="Actualizar Solicitud"><a href="" class="btn btn-warning"><i class="fa fa-edit"></i></a></span>
                        <span class="hint--top  hint--success" aria-label="Solicitar Aprobación"><a href="" class="btn btn-success" data-toggle="modal" data-target="#modalAprobacion" id="aprobacion"><i class="fa fa-thumbs-o-up"></i></a></span>
                    @endif
                    @if($item->sol_estado=='APROBADO')
                        <span class="hint--top  hint--info" aria-label="hacer seguimiento"><a href="" class="btn btn-primary"><i class="fa fa-bars"></i></a></span>
                    @endif
                    @if($item->sol_estado=='DEVUELTO')
                        <button class="btn btn-danger">Sin Acción}</button>
                    @endif
                    @if($item->sol_estado=='POR APROBAR')
                        <button class="btn btn-danger">Sin Acción</button>
                    @endif
                </td>
                <td>{{ $item->sol_codigo }}</td>
                <td>{{ $item->sol_nombre }}</td>
                <td>{{ $item->entidad->ent_nombre. ' - '.$item->sol_sigla }}</td>
                <td>{{ $item->departamento->dep_descripcion }}</td> 
                <td class="text-center">
                    @if($item->sol_estado=='TRANSCRIPCION')
                        <button class="btn btn-warning">{{ $item->sol_estado }}</button>
                    @endif
                    @if($item->sol_estado=='DEVUELTO')
                        <button class="btn btn-danger">{{ $item->sol_estado }}</button>
                    @endif
                    @if($item->sol_estado=='POR APROBAR')
                        <button class="btn btn-primary">{{ $item->sol_estado }}</button>
                    @endif
                    @if($item->sol_estado=='APROBADO')
                        <button class="btn btn-success">{{ $item->sol_estado }}</button>
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
            $('#aprobacion').click(function(e){
                e.preventDefault();
                $('#btnAprobacion').click(function(eve){
                    $("#modalAprobacion").modal('hide');
                    //enviar para aprobacion
                    location.reload();
                });
            });
        });
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
        <div class="modal-dialog modal-primary" role="document">
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
                    <button type="button" class="btn btn-warning" id="btnAprobacion">SI</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
@endsection