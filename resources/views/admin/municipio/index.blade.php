@extends('layouts.init')

@section('FormularioTitulo','Municipios')
@section('FormularioDescripcion','en este formulario se pueden observar todos los municipios correspondientes a una provincia')
@section('FormularioActual','Municipios')
@section('FormularioDetalle','Municipios')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="form-group">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <span class="hint--top  hint--success" aria-label="Registrar nuevo municipio"><a  href="{{ route('municipio.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo Municipio</a></span>
            </div>
        </div>
    </div>
    <?php $contadorFilas = 1; ?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
         <thead>
            <tr class="btn-primary">
                <th style="text-align: center !important;">#</th>
                <th style="text-align: center !important;">Acción</th>
                <th style="text-align: center !important;">Provincia</th>
                <th style="text-align: center !important;">Municipio</th>
                <th style="text-align: center !important;">Estado</th>
                <th style="text-align: center !important;">Registrado</th>
                <th style="text-align: center !important;">Actualizado</th>
            </tr>
        </thead>
        <tbody>        
            @foreach($municipio as $item)
            <tr>
                <td>{{ $contadorFilas++ }}</td>
                <td align="center">
                    <div class="form-horizontal">
                        <span class="hint--top  hint--info" aria-label="Actualizar"><a href="{{ route('municipio.edit', $item->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a></span>
                    </div>
                </td>
                <td>{{ $item->provincias->pro_nombre }}</td>
                <td>{{ $item->mun_nombre }}</td>
                <td align="center">
                    @if($item->mun_estado)
                        <span class="hint--top  hint--warning" aria-label="Municipio Habilitado"><button class="btn btn-warning btn-xs">Habilitado</button></span>
                    @else
                        <span class="hint--top  hint--error" aria-label="Municipio Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
                    @endif
                </td>
                <td align="center">{!! $item->created_at->diffForHumans() !!}</td>
                <td align="center">{!! $item->updated_at->diffForHumans() !!}</td>
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
                toastr["success"]("{{ Session::get('msg') }}", "{{ Session::get('title') }}");
            @endif
            @if(Session::get('estado')=="2")
                toastr["error"]("{{ Session::get('msg') }}", "{{ Session::get('title') }}");
            @endif
            @if(Session::get('estado'))
                {{ Session::forget('estado') }}
                {{ Session::forget('title') }}
                {{ Session::forget('msg') }}
            @endif
        });
    </script>
@endsection
