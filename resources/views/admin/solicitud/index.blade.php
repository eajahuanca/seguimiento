@extends('layouts.init')

@section('FormularioTitulo','Proyectos a Evaluar')
@section('FormularioDescripcion','en este formulario se pueden observar todos los proyectos a evaluar')
@section('FormularioActual','Proyectos a evaluar')
@section('FormularioDetalle','Proyectos')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
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
            <tr class="btn-success">
                <th style="text-align: center !important;">Opción</th>
                <th style="text-align: center !important;">Respaldo</th>
                <th style="text-align: center !important;">Cite</th>
                <th style="text-align: center !important;">Proyecto</th>
                <th style="text-align: center !important;">Entidad</th>
                <th style="text-align: center !important;">Sigla</th>
                <th style="text-align: center !important;">Responsable</th>
                <th style="text-align: center !important;">Monto Fonabosque (Bs)</th>
                <th style="text-align: center !important;">Monto Solicitado (Bs)</th>
                <th style="text-align: center !important;">Tiempo (años)</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($solicitud as $item)
            <tr id="{{ $item->id }}">
                <td>
                    <span class="hint--top  hint--warning" aria-label="Ver Solicitud"><a href="" class="btn btn-warning"><i class="fa fa-eye"></i></a></span>
                </td>
                <td><a href="{{ asset($item->proy_respaldo) }}" target="_blank"><i class="fa fa-pdf-o"></i></a></td>
                <td>{{ $item->proy_codigo }}</td>
                <td>{{ $item->proy_nombre }}</td>
                <td>{{ $item->proy_entidad }}</td>
                <td>{{ $item->proy_sigla }}</td>
                <td>{{ $item->responsable->us_nombre.' '.$item->responsable->us_paterno.' '.$item->responsable->us_materno }}</td>
                <td style="text-align: right !important;">{{ $item->proy_montofona }}</td>
                <td style="text-align: right !important;">{{ $item->proy_montosol }}</td>
                <td style="text-align: right !important;">{{ $item->proy_tiempo }}</td>
                <td>{{ $item->proy_estado }}</td>
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

            $('#')
            $('#nuevaSolicitud').click(function(e){
                e.preventDefault();
                $('#btnSI').click(function(eve){
                    $("#modalNuevo").modal('hide');
                    $('#formNuevo').submit();
                });
            });
        });
    </script>
    <!--Modal para registrar una nueva solicitud y generar cite-->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header panel-warning">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Advertencia</h4>
                </div>
                <div class="modal-body">
                    Al presionar <b>SI</b> se generara un Cite para la nueva solicitud el cual no se podra actualizar,
                    <br><b>¿ Está seguro de registrar una nueva solicitud ?</b>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="btnSI">SI</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
@endsection