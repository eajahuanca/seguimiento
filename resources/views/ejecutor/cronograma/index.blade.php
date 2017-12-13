@extends('layouts.init')

@section('FormularioTitulo','Cronograma General')
@section('FormularioDescripcion','en sección se carga la información sobre el cronograma general del Proyecto')
@section('FormularioActual',' Cronograma')
@section('FormularioDetalle','Cronograma General Proyecto')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#tab_1-1" data-toggle="tab">Datos del Cronograma</a></li>
                <li><a href="#tab_2-2" data-toggle="tab">Registro de Cronograma</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-print"></i> Reporte <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ url('/reportCronograma') }}" style="color:red;"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
                    </ul>
                </li>
                <li class="pull-left header"><i class="fa fa-bar-chart"></i> Cronograma</li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1-1">
                    <!--Datos del cronograma-->
                    <?php $cont = 1; ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Cronogramas registrados</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <table id="example" class="table table-striped table-bordered tblSigec" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="btn-success">
                                                <th style="text-align: center !important;">#</th>
                                                <th style="text-align: center !important;">Mes</th>
                                                <th style="text-align: center !important;">Corresponde A</th>
                                                <th style="text-align: center !important;">Descricpión</th>
                                                <th style="text-align: center !important;">Estado</th>
                                                <th style="text-align: center !important;">Fecha de Registro</th>
                                                <th style="text-align: center !important;">Registrado Por</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($ejecutor as $item)
                                            <tr>
                                                <td class="text-center">{{ $cont++ }}</td>
                                                <td class="text-center">{{ $item->eje_mes }}</td>
                                                <td>{{ $item->eje_corresponde }}</td>
                                                <td>{{ $item->eje_descripcion }}</td>
                                                <td>
                                                    @if($item->eje_ejecutado=="NO")
                                                        <span class="hint--top  hint--warning" aria-label="La Actividad no se esta ejecutando"><a class="btn btn-warning"><b>SIN EJECUCION</b></a></span>
                                                    @else
                                                        <span class="hint--top  hint--success" aria-label="La Actividad se ha ejecutado"><a class="btn btn-success"><b>EJECUTADO</b></a></span>
                                                    @endif
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>{{ $item->userRegistra->us_nombre.' '.$item->userRegistra->us_paterno.' '.$item->userRegistra->us_materno }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="tab_2-2">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-success box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Registrar datos de cronograma</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    @include('ejecutor.cronograma.form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('javascript')
    <script src="{{ asset('plugins/lte/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
        })
    </script>
    <script src="{{ asset('plugins/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/editor/ckeditor/config.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('eje_descripcion');
        })
    </script>
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
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif
        });
    </script>
@endsection
