@extends('layouts.init')

@section('FormularioTitulo','Objetivos especificos')
@section('FormularioDescripcion','registrar nuevo objetivo especifico')
@section('FormularioActual','Objetivos')
@section('FormularioDetalle','Registrar nuevo objetivo específico')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>PROYECTO</b></span>
                    <span>{{ $solicitud->sol_nombre }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>Entidad Ejecutora</b></span>
                    <span>{{ $solicitud->entidad->ent_nombre }}</span>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa ">Bs</i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>IMPORTES (Bs)</b></span>
                    <span>FONABOSQUE: <b>{{ $solicitud->sol_montofona }}</b><br>CONTRAPARTE: <b>{{ $solicitud->sol_montosol }}</b><br>OTRO: <b>{{ $solicitud->sol_montootro }}</b></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>OBJETIVO GENERAL</b></span>
                    <span>{{ $solicitud->sol_objetivo }}</span>
                </div>
            </div>
        </div>
    </div>

    {!! Form::open(['route' => 'objetivo.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        
        @include('admin.objetivo.form')
                
        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
            </center>
        </div>
    {!! Form::close() !!}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success collapsed-box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Objetivos Especificos registrados del proyecto</h3>
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
                                <th>Objetivo Específico</th>
                                <th>Metas</th>
                                <th>Resultados</th>
                                <th>Registro
                                </th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($objetivo as $item)
                            <tr id="{{ $item->id }}">
                                <td>{{ $cont++ }}</td>
                                <td>
                                    <span class="hint--top  hint--warning" aria-label="Cargar Acciones"><a href="{{ route('accion.edit', encrypt($item->id)) }}" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a></span>
                                    <span class="hint--top  hint--success" aria-label="Cargar Coordenadas"><a href="{{ route('coordenada.edit', encrypt($item->id)) }}" class="btn btn-success btn-xs"><i class="fa fa-map-marker"></i></a></span>
                                    <span class="hint--top  hint--info" aria-label="Ver Acciones"><a role="button" class="btn btn-primary btn-xs verAcciones" id="verAcciones"><i class="fa fa-eye"></i></a></span>
                                    <span class="hint--top  hint--info" aria-label="Ver Coordenadas"><a data-toggle="modal" data-target="#modalCoordernadas" class="btn btn-primary btn-xs" id="verAcciones"><i class="fa fa-eye"></i></a></span>
                                </td>
                                <td>{!! $item->esp_objetivo !!}</td>
                                <td>{!! $item->esp_meta !!}</td>
                                <td>{!! $item->esp_resultado !!}</td>
                                <td>{{ $item->created_at }}</td>
                                <td valign="middle">
                                    @if($item->esp_estado)
                                        <span class="hint--top  hint--warning" aria-label="Objetivo Especifico Habilitado"><button class="btn btn-warning btn-xs">Activo</button></span>
                                    @else
                                        <span class="hint--top  hint--error" aria-label="Objetivo Especifico Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
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
            CKEDITOR.replace('esp_objetivo');
            CKEDITOR.replace('esp_meta');
            CKEDITOR.replace('esp_resultado');
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
            _modalAccion = $('#modalAcciones');
            $('.verAcciones').unbind().bind('click',function(e){
                e.preventDefault();
                _fila = $(this).closest('tr');
                id = _fila.attr('id');
                $.ajax({
                    url:"{{ url('/getAccion') }}" + "/" + id,
                    success: function(response){
                        _modalAccion.find('.modal-body').html(response);
                        _modalAccion.modal('show');
                    }
                });
            });
        });
    </script>
    <!--Modal Para ver las ACCIONES de un Objetivo-->
    <div class="modal fade" id="modalAcciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Acciones del Objetivo Específico</h4>
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
