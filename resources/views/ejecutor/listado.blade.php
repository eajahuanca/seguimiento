@extends('layouts.init')

@section('FormularioTitulo','Listado de Componentes, Metas y Actividades')
@section('FormularioDescripcion','en sección se visualizan los Objetivos, Componentes, Metas y Actividades')
@section('FormularioActual','Listado')
@section('FormularioDetalle','Objetivos, Componentes, Metas y Actividades')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Objetivos, Componentes, Metas y Actividades</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr class="btn-success">
                                <th style="text-align: center !important;">Objetivos</th>
                                <th style="text-align: center !important;">Componentes</th>
                                <th style="text-align: center !important;">Metas</th>
                                <th style="text-align: center !important;">Actividades</th>
                                <th style="text-align: center !important;">Seguimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proyecto as $item)
                            <tr>
                                <td>{!! $item->esp_objetivo !!}</td>
                                <td>{!! $item->esp_componente !!}</td>
                                <td>{!! $item->met_nombre !!}</td>
                                <td>{!! $item->act_nombre !!}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning dropdown-toggle"
                                                data-toggle="dropdown">
                                            <span class="hint--top  hint--warning" aria-label="Registrar Programación"><i class="fa fa-bar-chart"></i><span class="caret"></span></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="{{ url('/progra1', ['idactividad' => encrypt($item->id), 'idsolicitud' => encrypt($solicitud->id)]) }}"><i class="fa fa-chevron-circle-right"></i> Formulario #1</a></li>
                                            <li><a href="{{ url('/progra2', ['idactividad' => encrypt($item->id), 'idsolicitud' => encrypt($solicitud->id)]) }}"><i class="fa fa-chevron-circle-right"></i> Formulario #2</a></li>
                                            <li><a href="{{ url('/progra3', ['idactividad' => encrypt($item->id), 'idsolicitud' => encrypt($solicitud->id)]) }}"><i class="fa fa-chevron-circle-right"></i> Formulario #3</a></li>
                                            <li><a href="{{ url('/progra4', ['idactividad' => encrypt($item->id), 'idsolicitud' => encrypt($solicitud->id)]) }}"><i class="fa fa-chevron-circle-right"></i> Formulario #4</a></li>
                                        </ul>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                data-toggle="dropdown">
                                            <span class="hint--top  hint--info" aria-label="Registrar Avance"><i class="fa fa-edit"></i><span class="caret"></span></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="{{ url('/avance1', ['idactividad' => encrypt($item->id), 'idsolicitud' => encrypt($solicitud->id), 'form' => encrypt('FORMULARIO1')]) }}"><i class="fa fa-edit"></i> Formulario #1</a></li>
                                            <li><a href="{{ url('/avance2', ['idactividad' => encrypt($item->id), 'idsolicitud' => encrypt($solicitud->id), 'form' => encrypt('FORMULARIO2')]) }}"><i class="fa fa-edit"></i> Formulario #2</a></li>
                                            <li><a href="{{ url('/avance3', ['idactividad' => encrypt($item->id), 'idsolicitud' => encrypt($solicitud->id), 'form' => encrypt('FORMULARIO3')]) }}"><i class="fa fa-edit"></i> Formulario #3</a></li>
                                            <li><a href="{{ url('/avance4', ['idactividad' => encrypt($item->id), 'idsolicitud' => encrypt($solicitud->id), 'form' => encrypt('FORMULARIO4')]) }}"><i class="fa fa-edit"></i> Formulario #4</a></li>
                                        </ul>
                                    </div>
                                </td>
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
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif
        });
    </script>
@endsection
