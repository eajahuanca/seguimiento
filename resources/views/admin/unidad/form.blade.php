<div class="col-md-12">

	<div class="form-group {{ $errors->has('entidad_id')?' has-error':'' }}">
        {!! Form::label('entidad_id', 'Seleccione la Entidad (UE)', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-bullseye"></i>
                </div>
                {!! Form::select('entidad_id', $entidad, null, ['class' => 'form-control select2']) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('uni_nombre')?' has-error':'' }}">
        {!! Form::label('uni_nombre', 'Nombre de la Unidad', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-indent"></i>
                </div>
                {!! Form::text('uni_nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la unidad']) !!}
            </div>
            @if($errors->has('uni_nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('uni_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>

	<div class="form-group {{ $errors->has('uni_estado')?' has-error':'' }}">
        {!! Form::label('uni_estado', 'Estado de la Unidad', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-unlock"></i>
                </div>
                {!! Form::select('uni_estado', [true => 'Habilitado', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
            </div>
        </div>
    </div>
	
    <div class="form-group {{ $errors->has('uni_obs')?' has-error':'' }}">
        {!! Form::label('uni_obs', 'Observaciones', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-bars"></i>
                </div>
                {!! Form::textarea('uni_obs', null, ['class' => 'form-control', 'rows' => '3']) !!}
            </div>
            @if($errors->has('uni_obs'))
                <span class="help-block">
                    <strong>{{ $errors->first('uni_obs') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>