@extends('layouts.init')

@section('FormularioTitulo','Entidad')
@section('FormularioDescripcion','en este formulario se pueden observar todas las entidades')
@section('FormularioActual','Entidades')
@section('FormularioDetalle','Entidades')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar nueva Entidad"><a  href="{{ route('entidad.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Nueva Entidad</a></span>
            </div>
        </div>
    </div>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Acción</th>
                <th style="text-align: center !important;">Departamento</th>
                <th style="text-align: center !important;">Ciudad</th>
                <th style="text-align: center !important;">Entidad</th>
                <th style="text-align: center !important;">Sigla</th>
                <th style="text-align: center !important;">Unidad</th>
                <th style="text-align: center !important;">Provincia</th>
                <th style="text-align: center !important;">Municipio</th>
                <th style="text-align: center !important;">Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($entidad as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar Datos"><a href="{{ route('entidad.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->param_depto }}</td>
                <td>{{ $item->param_entidad }}</td>
                <td>{{ $item->param_sigla }}</td>
                <td>{{ $item->param_unidad }}</td>
                <td>{{ $item->param_provincia }}</td>
                <td>{{ $item->param_municipio }}</td>
                <td align="center">
                    @if($item->param_estado)
                        <span class="hint--top  hint--warning" aria-label="Entidad Habilitado"><button class="btn btn-warning btn-xs">Activo</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Entidad Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
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
        } );
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            @if(Session::get('estado')=="1")
                toastr["success"]("{{ Session::get('title') }}", "{{ Session::get('msg') }}");
            @endif
            @if(Session::get('estado')=="2")
                toastr["error"]("{{ Session::get('title') }}", "{{ Session::get('msg') }}");
            @endif
            @if(Session::get('estado'))
                {{ Session::forget('estado') }}
                {{ Session::forget('title') }}
                {{ Session::forget('msg') }}
            @endif
        });
    </script>
@endsection
