@extends('layouts.init')

@section('FormularioTitulo','Reglamentos - Guías')
@section('FormularioDescripcion','en este formulario se pueden observar todas guias y/o reglamentos')
@section('FormularioActual','Reglamentos')
@section('FormularioDetalle','Reglamentos - Guías')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="clearfix">
        <div class="pull-left">
            <span class="hint--top  hint--success" aria-label="Registrar nuevo reglamento"><a  href="{{ route('reglamento.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo Reglamento</a></span>
        </div>
        <div class="pull-right tableTools-container"></div>
    </div>
    <hr class="btn-primary">
    <?php $cont=1; ?>
    <table id="dynamic-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="20px">#</th>
                <th>Acción</th>
                <th>Archivo</th>
                <th>Nombre del Reglamento</th>
                <th>Descripcion del Reglamento</th>
                <th>
                    <i class="ace-icon fa fa-calendar bigger-110"></i>
                    Fecha de Registro/Actualización
                </th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reglamento as $item)
            <tr>
                <td>{{ $cont++ }}</td>
                <td>
                    <span class="hint--top  hint--info" aria-label="Editar"><a href="{{ route('reglamento.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></span>
                </td>
                <td><a href="{{ asset($item->reg_archivo) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfico.png') }}" width="26px" height="30px"/></a></td>
                <td>{{ $item->reg_nombre }}</td>
                <td>{{ $item->reg_descripcion }}</td> 
                <td>{{ $item->created_at.' / '.$item->updated_at }}</td>
                <td>
                    @if($item->reg_estado)
                        <span class="hint--top  hint--warning" aria-label="Reglamento Habilitado"><button class="btn btn-warning btn-xs">Activo</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Reglamento Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
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

    <script src="{{ asset('plugins/datatables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/js/buttons.colVis.min.js') }}"></script>
    @include('admin.scriptDataTable')

    <script type="text/javascript">
        $(document).ready(function(){
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
@endsection
