@extends('layouts.init')

@section('FormularioTitulo','Proyectos && Programas')
@section('FormularioDescripcion','en este formulario se pueden observar todos los proyectos && programas para el primer desembolso')
@section('FormularioActual','Aprobar Solicitud(es)')
@section('FormularioDetalle','Aprobar Solicitud(es) para el Primer Desembolso')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>TECHO PRESUPUESTARIO</b></span>
                    <span>
                        
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa "><b>Bs</b></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>IMPORTES</b></span>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>TIEMPO</b></span>
                </div>
            </div>
        </div>
    </div>
    <?php $cont = 1; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Solicitud(es) para el Primer Desembolso</h3>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-striped table-bordered tblSigec" cellspacing="0" width="100%">
                        <thead>
                            <tr class="btn-success">
                                <th style="text-align: center !important;">#</th>
                                <th style="text-align: center !important;">Acción</th>
                                <th style="text-align: center !important;">Código</th>
                                <th style="text-align: center !important;">Proyecto</th>
                                <th style="text-align: center !important;">Entidad (UE)</th>
                                <th style="text-align: center !important;">Ciudad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitud as $item)
                            <tr>
                                <td class="text-center">{{ $cont++ }}</td>
                                <td class="text-center">
                                    <span class="hint--top  hint--warning" aria-label="Autorizar Primer Desembolso"><a href="{{ route('autorizacion.show', encrypt($item->id)) }}" class="btn btn-warning"><i class="fa "><b>Bs</b></i></a></span>
                                </td>
                                <td>{{ $item->sol_codigo }}</td>
                                <td>{{ $item->sol_nombre }}</td>
                                <td>{{ $item->entidad->ent_nombre }}</td>
                                <td>{{ $item->departamento->dep_descripcion }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script src="{{ asset('plugins/lte/datatables/responsive/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();

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