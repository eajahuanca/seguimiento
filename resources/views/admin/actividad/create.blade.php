@extends('layouts.init')

@section('FormularioTitulo','Actividades')
@section('FormularioDescripcion','registrar nueva actividad')
@section('FormularioActual','Actividades')
@section('FormularioDetalle','Registrar nueva actividad')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>OBJETIVO GENERAL</b></span>
                    <span>{!! $objetivo->solicitudes->sol_objetivo !!}</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa ">Bs</i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>OBJETIVO ESPECIFICO</b></span>
                    <span>{!! $objetivo->esp_objetivo !!}</b></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>COMPONENTE</b></span>
                    <span>{!! $objetivo->esp_componente !!}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>META</b></span>
                    <span>{!! $meta->met_nombre !!}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar Nueva Actividad</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                {!! Form::open(['route' => 'actividad.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    
                    @include('admin.actividad.form')
                            
                    <div class="form-group">
                        <center>
                            <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                            <span class="hint--top  hint--error" aria-label="Cancelar el registro"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
                            <span class="hint--top  hint--error" aria-label="Ver Metas"><a href="{{ route('meta.edit',encrypt($objetivo->id)) }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Meta</a></span>
                            <span class="hint--top  hint--error" aria-label="Ver Objetivos/Componentes"><a href="{{ route('objetivo.edit',encrypt($objetivo->id)) }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Objetivos/Componentes</a></span>
                        </center>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success collapsed-box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Actividades registradas correspondientes a la meta seleccionada</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <?php $cont=1; ?>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="20px">#</th>
                                <th>Descripción de la Actividad</th>
                                <th>Cantidad |Unidad de Medida</th>
                                <th>Otros</th>
                                <th>Observaciones</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actividad as $item)
                            <tr id="{{ $item->id }}" >
                                <td>{{ $cont++ }}</td>
                                <td>{!! $item->act_nombre !!}</td>
                                <td>{!! $item->act_cantidad.' | '.$item->act_unidad !!}</td>
                                <td>{!! $item->act_otro !!}</td>
                                <td>{!! $item->act_obs !!}</td>
                                <td valign="middle">
                                    @if($item->act_estado)
                                        <span class="hint--top  hint--warning" aria-label="Actividad Habilitado"><button class="btn btn-warning btn-xs">Activo</button></span>
                                    @else
                                        <span class="hint--top  hint--error" aria-label="Actividad Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
                                    @endif
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
            CKEDITOR.replace('act_nombre');
            CKEDITOR.replace('act_obs');
        })
    </script>
    <script src="{{ asset('plugins/lte/datatables/responsive/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable();
        })
    </script>
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
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif
        });
    </script>
@endsection
