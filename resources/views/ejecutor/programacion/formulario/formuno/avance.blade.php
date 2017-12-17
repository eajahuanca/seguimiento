@extends('layouts.init')

@section('FormularioTitulo','Avances')
@section('FormularioDescripcion','en sección se visualizan el formulario de registro de avances')
@section('FormularioActual','Avance')
@section('FormularioDetalle','Formulario de registro de avance')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Avances, Formulario # 1</h3>
                    <p>{!! $actividad->act_nombre !!}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Registro de Avance de Actividades</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <!--Cuerpo de progrmacion-->
                {!! Form::open(['url' => '/saveAV1', 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
                {!! Form::hidden('idactividad',encrypt($actividad->id)) !!}
                {!! Form::hidden('idsolicitud',encrypt($solicitud->id)) !!}
                {!! Form::hidden('form_formulario',encrypt($formulario)) !!}

                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_mes', 'Mes de Avance', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {!! Form::select('form_mes', ['MES1' => 'MES 1', 'MES2' => 'MES 2', 'MES3' => 'MES 3', 'MES4' => 'MES 4', 'MES5' => 'MES 5', 'MES6' => 'MES 6', 'MES7' => 'MES 7', 'MES8' => 'MES 8', 'MES9' => 'MES 9', 'MES10' => 'MES 10', 'MES11' => 'MES 11', 'MES12' => 'MES 12', 'MES13' => 'MES 13', 'MES14' => 'MES 14', 'MES15' => 'MES 15'], null, ['class' => 'form-control select2']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_avance', 'Avance de la Actividad', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-send"></i>
                                    </div>
                                    {!! Form::text('form_avance', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_obs', 'Algunas observaciones', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::textarea('form_obs', null, ['class' => 'form-control', 'rows' => 3]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <center>
                        <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                        <span class="hint--top  hint--error" aria-label="Cancelar el registro"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
                        <span class="hint--top  hint--error" aria-label="Regresar a la Anterior Vista"><a href="{{ URL::previous() }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Regresar</a></span>
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
    <script src="{{ asset('plugins/lte/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
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