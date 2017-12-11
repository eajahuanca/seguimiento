@extends('layouts.init')

@section('FormularioTitulo','Programación')
@section('FormularioDescripcion','en sección se visualizan el formulario de registro de programación')
@section('FormularioActual','Programación')
@section('FormularioDetalle','formulario de registro de programación')

@section('stylesheet')
@endsection

@section('ContenidoPagina')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Registro de Programación de Actividades</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <!--Cuerpo de progrmacion-->
                {!! Form::open(['route' => 'ejecutor.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('idactividad',encrypt($idactividad)) !!}
                {!! Form::hidden('idsolicitud',encrypt($idsolicitud)) !!}
                <div class="col-md-12 col-xs-12">

                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('pro_descripcion', 'Descripción de la Compra/Acción', ['class' => 'col-md-12 col-xs-12']) !!}
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                        {!! Form::text('pro_descripcion', null, ['placeholder' => 'Descripción de la Compra o Acción (Unidad)', 'class' => 'form-control']) !!}
                                    </div>
                                    <span id="msg-error2" class="help-block" style="display:none; color:red" role="alert">
                                        <strong id="error2"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('pro_unidad', 'Unidad', ['class' => 'col-md-12 col-xs-12']) !!}
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-server"></i>
                                        </div>
                                        {!! Form::select('pro_unidad', ['pieza' => 'Pieza (pza)', 'Otro' => 'Otro (otro)'], null, ['class' => 'form-control select2']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('pro_cantidad', 'Cantidad', ['class' => 'col-md-12 col-xs-12']) !!}
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                        {!! Form::text('pro_cantidad', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <span id="msg-error1" class="help-block" style="display:none; color:red" role="alert">
                                        <strong id="error1"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('pro_mes', 'Programado Mes', ['class' => 'col-md-12 col-xs-12']) !!}
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i><b style="font-family:arial;">PG</b></i>
                                        </div>
                                        {!! Form::text('pro_mes', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <span id="msg-error9" class="help-block" style="display:none; color:red" role="alert">
                                        <strong id="error9"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('pro_poblacion', 'Población Meta', ['class' => 'col-md-12 col-xs-12']) !!}
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-bars"></i>
                                        </div>
                                        {!! Form::text('pro_poblacion', null, ['placeholder' => 'Población Meta', 'class' => 'form-control']) !!}
                                    </div>
                                    <span id="msg-error2" class="help-block" style="display:none; color:red" role="alert">
                                        <strong id="error2"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('pro_tematica', 'Temática', ['class' => 'col-md-12 col-xs-12']) !!}
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i><b style="font-family:arial;">TE</b></i>
                                        </div>
                                        {!! Form::text('pro_tematica', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <span id="msg-error9" class="help-block" style="display:none; color:red" role="alert">
                                        <strong id="error9"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('pro_personas', 'Número de Personas', ['class' => 'col-md-12 col-xs-12']) !!}
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class=" fa fa-user"></i>
                                        </div>
                                        {!! Form::text('pro_personas', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <span id="msg-error10" class="help-block" style="display:none; color:red" role="alert">
                                        <strong id="error10"></strong>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('pro_material', 'Material de Apoyo', ['class' => 'col-md-12 col-xs-12']) !!}
                                <div class="col-md-12 col-xs-12">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i><b style="font-family:arial;">MA</b></i>
                                        </div>
                                        {!! Form::text('pro_material', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <span id="msg-error11" class="help-block" style="display:none; color:red" role="alert">
                                        <strong id="error11"></strong>
                                    </span>
                                </div>
                            </div>
                        </div!>
                    </div>
                </div>
                <div class="form-group">
                    <center>
                        <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                        <span class="hint--top  hint--error" aria-label="Cancelar el registro"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
                    </center>
                </div>
                {!! Form::close() !!}
                <!--Fin Cuerpo de progrmacion-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

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
