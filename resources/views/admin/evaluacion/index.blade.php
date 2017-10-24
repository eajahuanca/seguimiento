@extends('layouts.init')

@section('FormularioTitulo','Solicitud')
@section('FormularioDescripcion','en este formulario se pueden observar todos las solicitudes a aprobar')
@section('FormularioActual','Solicitud')
@section('FormularioDetalle','Solicitudes por Aprobar')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <table id="example" class="table table-striped table-bordered tblSigec" cellspacing="0" width="100%">
        <thead>
            <tr class="btn-success">
                <th style="text-align: center !important;">Opción</th>
                <th style="text-align: center !important;">Código</th>
                <th style="text-align: center !important;">Proyecto</th>
                <th style="text-align: center !important;">Entidad (UE)</th>
                <th style="text-align: center !important;">Ciudad</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluacion as $item)
            <tr>
                <td class="text-center">
                    <span class="hint--top  hint--warning" aria-label="Ver Proyecto"><a href="{{ route('evaluacion.show', $item->id) }}" class="btn btn-warning"><i class="fa fa-eye"></i></a></span>
                    <span class="hint--top  hint--error" aria-label="Rechazar"><a class="btn btn-danger" data-toggle="modal" data-target="#modalRechazar" id="rechazar"><i class="fa fa-reply"></i></a></span>
                    <span class="hint--top  hint--info" aria-label="Aprobar"><a href="{{ route('evaluacion.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-check"></i></a></span>
                </td>
                <td>{{ $item->sol_codigo }}</td>
                <td>{{ $item->sol_nombre }}</td>
                <td>{{ $item->entidad->ent_nombre }}</td>
                <td>{{ $item->departamento->dep_descripcion }}</td>
                <td class="text-center">{{ $item->sol_estado }}</td>
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
            
            $('#rechazar').click(function(e){
                e.preventDefault();
                $('#btnRechazar').click(function(eve){
                    $("#modalRechazar").modal('hide');
                    //rechazar proyecto
                    location.reload();
                });
            });

            @if(Session::get('estado')=="1")
                toastr["success"]("{{ Session::get('msg') }}","{{ Session::get('title') }}");
            @endif
            @if(Session::get('estado')=="2")
                toastr["error"]("{{ Session::get('msg') }}", "{{ Session::get('title') }}");
            @endif
            {{ Session::forget('estado') }}
            {{ Session::forget('title') }}
            {{ Session::forget('msg') }}
        });
    </script>
    <!--Modal para rechazar el proyecto-->
    <div class="modal fade" id="modalRechazar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Advertencia</h4>
                </div>
                <div class="modal-body">
                    Al presionar <b>SI</b> confirmará el rechazo del proyecto y el Técnico de Planificación procedera a la devolución del mismo
                    <br><b>¿ Está seguro de rechazar el proyecto ?</b>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btnRechazar">SI</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
@endsection