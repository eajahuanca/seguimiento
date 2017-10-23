@extends('layouts.init')

@section('FormularioTitulo','Area')
@section('FormularioDescripcion','en este formulario se pueden observar todas las areas')
@section('FormularioActual','Areas')
@section('FormularioDetalle','Areas')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="clearfix">
        <div class="pull-left">
            <span class="hint--top  hint--success" aria-label="Registrar nueva Area"><a  href="{{ route('area.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Nueva Area</a></span>
        </div>
        <div class="pull-right tableTools-container"></div>
    </div>
    <hr class="btn-primary">
    <?php $cont=1; ?>
    <table id="dynamic-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th width="20px">#</th>
                <th>Nombre del Area</th>
                <th>Estado</th>
                <th>
                    <i class="ace-icon fa fa-calendar bigger-110"></i>
                    Fecha de Registro
                </th>
                <th></th>
                <th>
                    <i class="ace-icon fa fa-calendar bigger-110"></i>
                    Fecha de Actualización
                </th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($area as $item)
            <tr>
                <td>{{ $cont++ }}</td>
                <td>{{ $item->ar_nombre }}</td>
                <td>
                    @if($item->ar_estado)
                        <span class="hint--top  hint--warning" aria-label="Area Habilitado"><button class="btn btn-warning btn-xs">Activo</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Area Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
                    @endif
                </td>
                <td>{{ $item->created_at }}</td>
                <td></td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <span class="hint--top  hint--info" aria-label="Editar"><a href="{{ route('area.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a></span>
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
