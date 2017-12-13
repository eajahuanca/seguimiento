@extends('layouts.init')

@section('FormularioTitulo','Metas del Componente')
@section('FormularioDescripcion','registrar nueva Meta')
@section('FormularioActual','Metas')
@section('FormularioDetalle','Registrar nueva meta')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>OBJETIVO GENERAL</b></span>
                    <span>{!! $objetivo->solicitudes->sol_objetivo !!}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>OBJETIVO ESPECIFICO</b></span>
                    <span>{!! $objetivo->esp_objetivo !!}</span>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>COMPONENTE</b></span>
                    <span>{!! $objetivo->esp_componente !!}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva Meta</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
    
                {!! Form::open(['route' => 'meta.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                    
                    @include('admin.meta.form')
                            
                {!! Form::close() !!}
                
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success collapsed-box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Metas registradas del Componente seleccioando</h3>
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
                                <th>Acción</th>
                                <th>Descripción de la Meta</th>
                                <th>Registro
                                </th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($meta as $item)
                            <tr id="{{ $item->id }}">
                                <td>{{ $cont++ }}</td>
                                <td>
                                    <span class="hint--top  hint--warning" aria-label="Cargar Actividades"><a href="{{ route('actividad.edit', encrypt($item->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-sign-in"></i></a></span>
                                    <span class="hint--top  hint--info" aria-label="Ver Actividades"><a role="button" class="btn btn-primary btn-xs verActividades" data-toogle="verActividades" id="verActividades"><i class="fa fa-eye"></i></a></span>
                                </td>
                                <td>{!! $item->met_nombre !!}</td>
                                <td>{{ $item->created_at }}</td>
                                <td valign="middle">
                                    @if($item->met_estado)
                                        <span class="hint--top  hint--warning" aria-label="Meta Correctamente Habilitado"><button class="btn btn-warning btn-xs">Activo</button></span>
                                    @else
                                        <span class="hint--top  hint--error" aria-label="Meta Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
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
    <script src="{{ asset('plugins/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/editor/ckeditor/config.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('met_nombre');
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
    <script type="text/javascript">
        $(document).ready(function(){
            _modalAccion = $('#modalActividades');
            $('.verActividades').unbind().bind('click',function(e){
                e.preventDefault();
                _fila = $(this).closest('tr');
                id = _fila.attr('id');
                $.ajax({
                    url:"{{ url('/getActividad') }}" + "/" + id,
                    success: function(response){
                        _modalAccion.find('.modal-body').html(response);
                        _modalAccion.modal('show');
                    }
                });
            });
        });
    </script>
    <!--Modal Para ver las ACCIONES de un Objetivo-->
    <div class="modal fade" id="modalActividades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Actividades de la Meta Seleccionada</h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <a class="btn btn-default" data-dismiss="modal">Cerrar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
