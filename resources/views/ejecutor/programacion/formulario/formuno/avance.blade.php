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
                <?php $position = 1; ?>
                @foreach($programado as $item)
                {!! Form::hidden('form_mes',$item->form_mes) !!}
                <div class="row">
                    {!! Form::hidden('id'.$position, $item->id) !!}
                    <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_descripcion', 'Descripción de la Compra o acción', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::text('form_descripcion', $item->form_descripcion, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_cantidad', 'Cantidad', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::text('form_cantidad', $item->form_cantidad, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_unidad', 'Unidad', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::text('form_unidad', $item->form_unidad, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_programado', 'Programado (BS)', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa " style="font-style:italic;"><b>PG</b></i>
                                    </div>
                                    {!! Form::text('form_programdo'.$position, $item->form_programado, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_avance', 'Avance (BS)', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa " style="font-style:italic;"><b>AV</b></i>
                                    </div>
                                    {!! Form::text('form_avance'.$position, null, ['class' => 'form-control', 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('form_obs', 'Algunas observaciones', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::textarea('form_obs'.$position, null, ['class' => 'form-control', 'rows' => 2, 'required' => true]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="border-color:green;"/>
                <?php $position += 1; ?>
                @endforeach
                {!! Form::hidden('position', $position) !!} 
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