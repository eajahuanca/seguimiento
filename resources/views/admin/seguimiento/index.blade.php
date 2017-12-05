@extends('layouts.init')

@section('FormularioTitulo','Proyectos && Programas')
@section('FormularioDescripcion','en este formulario se pueden observar todos los proyectos && programas para hacer seguimiento')
@section('FormularioActual','Proyectos && Programas')
@section('FormularioDetalle','Hacer seguimiento a proyectos && programas aprobados')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <?php $cont = 1; ?>
    <table id="example" class="table table-striped table-bordered tblSigec" cellspacing="0" width="100%">
        <thead>
            <tr class="btn-success">
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
            @foreach($seguimiento as $item)
            <tr>
                <td class="text-center">{{ $cont++ }}</td>
                <td class="text-center">
                    <span class="hint--top  hint--warning" aria-label="Ver Proyecto"><a href="{{ route('seguimiento.show', encrypt($item->id)) }}" class="btn btn-warning"><i class="fa fa-eye"></i></a></span>
                    <span class="hint--top  hint--info" aria-label="Cargar información complementaria del proyecto"><a href="{{ route('objetivo.edit', encrypt($item->id)) }}" class="btn btn-primary"><i class="fa fa-check"></i></a></span>
                    <span class="hint--top  hint--info" aria-label="Cargar documentación previa"><a href="{{ route('documento.show', encrypt($item->id)) }}" class="btn btn-primary"><i class="fa fa-sign-out"></i></a></span>
                    <span class="hint--top  hint--info" aria-label="Cargar Cronograma Financiero"><a href="{{ route('cronograma.show', encrypt($item->id)) }}" class="btn btn-primary"><i class="fa "><b>Bs</b></i></a></span>
                    <span class="hint--top  hint--info" aria-label="Solicitar Primer Desembolso"><a href="{{ route('desembolso1.show', encrypt($item->id)) }}" class="btn btn-primary"><i class="fa "><b>Bs</b></i></a></span>

                </td>
                <td>{{ $item->sol_codigo }}</td>
                <td>{{ $item->sol_nombre }}</td>
                <td>{{ $item->entidad->ent_nombre }}</td>
                <td>{{ $item->departamento->dep_descripcion }}</td>
                <td class="text-center">
                @if($item->sol_estado=="FIRMADO")
                    <b>HACER SEGUIMIENTO</b>
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
@endsection