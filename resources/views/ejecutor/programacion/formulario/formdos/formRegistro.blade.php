{!! Form::open(['url' => 'savePG2', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
{!! Form::hidden('idactividad',encrypt($actividad->id)) !!}
{!! Form::hidden('idsolicitud',encrypt($solicitud->id)) !!}

<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('form_mes', 'Mes de la Programación', ['class' => 'col-md-12 col-xs-12']) !!}
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
            {!! Form::label('form_personas', 'Número de Personas', ['class' => 'col-md-12 col-xs-12']) !!}
            <div class="col-md-12 col-xs-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    {!! Form::number('form_personas', null, ['placeholder' => 'Número de Personas', 'class' => 'form-control', 'min' => 1, 'max' => 1000]) !!} 
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('form_programado', 'Programado', ['class' => 'col-md-12 col-xs-12']) !!}
            <div class="col-md-12 col-xs-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i><b style="font-family:arial;">PG</b></i>
                    </div>
                    {!! Form::text('form_programado', null, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
    </div>  
</div>

<div class="row">
    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('form_poblacion', 'Población Meta', ['class' => 'col-md-12 col-xs-12']) !!}
            <div class="col-md-12 col-xs-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-user"></i>
                    </div>
                    {!! Form::textarea('form_poblacion', null, ['placeholder' => 'Población Meta', 'class' => 'form-control', 'rows' => '3']) !!}
                </div>
            </div>
        </div>
    </div>
                    
    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('form_tematica', 'Temática', ['class' => 'col-md-12 col-xs-12']) !!}
            <div class="col-md-12 col-xs-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-bars"></i>
                    </div>
                    {!! Form::textarea('form_tematica', null, ['placeholder' => 'Temática', 'class' => 'form-control', 'rows' => '3']) !!} 
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            {!! Form::label('form_apoyo', 'Material de Apoyo', ['class' => 'col-md-12 col-xs-12']) !!}
            <div class="col-md-12 col-xs-12">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i><b style="font-family:arial;">MA</b></i>
                    </div>
                    {!! Form::textarea('form_apoyo', null, ['placeholder' => 'Material de Apoyo', 'class' => 'form-control', 'rows' => '3'  ]) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <center>
        <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
        <span class="hint--top  hint--error" aria-label="Cancelar el registro"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Limpiar</button></span>
        <span class="hint--top  hint--error" aria-label="Regresar a la Anterior Vista"><a href="{{ URL::previous() }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Regresar</a></span>
    </center>
</div>
{!! Form::close() !!}