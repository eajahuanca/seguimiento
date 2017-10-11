@extends('layouts.init')

@section('FormularioTitulo','Unidades Proponentes')
@section('FormularioDescripcion','en este formulario se pueden observar todas las unidades proponentes')
@section('FormularioActual','Unidades')
@section('FormularioDetalle','Unidades')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar nueva unidad"><a  href="{{ route('unidad.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Nueva Unidad</a></span>
            </div>
        </div>
    </div>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Acción</th>
                <th style="text-align: center !important;">Nombre entidad</th>
                <th style="text-align: center !important;">Unidad</th>
                <th style="text-align: center !important;">Estado</th>
                <th style="text-align: center !important;">Registrado</th>
                <th style="text-align: center !important;">Actualizado</th>
                <th style="text-align: center !important;">Observaciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $contadorFilas = 1;?>
            @foreach($unidad as $item)
            <tr id="{{ $item->id }}">
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar"><a href="{{ route('unidad.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->entidad->ent_nombre }}</td>
                <td>{{ $item->uni_nombre }}</td>
                <td align="center">
                    @if($item->uni_estado)
                        <span class="hint--top  hint--warning" aria-label="Unidad Habilitado"><button class="btn btn-warning btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Unidad Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
                    @endif
                </td>
                <td align="center">{!! $item->userRegistra->us_nombre.' '.$item->userRegistra->us_paterno.' '.$item->userRegistra->us_materno.'<br>'.$item->created_at->diffForHumans() !!}</td>
                <td align="center">{!! $item->userActualiza->us_nombre.' '.$item->userActualiza->us_paterno.' '.$item->userActualiza->us_materno.'<br>'.$item->updated_at->diffForHumans() !!}</td>
				<td>{{ $item->ent_obs }}</td>
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
