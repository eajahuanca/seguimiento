<div class="col-md-12">

	<div class="form-group {{ $errors->has('iddepto')?' has-error':'' }}">
        {!! Form::label('iddepto', 'Seleccione el Departamento', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-bullseye"></i>
                </div>
                {!! Form::select('iddepto', $departamento, null, ['class' => 'form-control select2']) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('pro_nombre')?' has-error':'' }}">
        {!! Form::label('pro_nombre', 'Nombre de la Provincia', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-object-ungroup"></i>
                </div>
                {!! Form::text('pro_nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la provincia']) !!}
            </div>
            @if($errors->has('pro_nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('pro_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>

	<div class="form-group {{ $errors->has('pro_estado')?' has-error':'' }}">
        {!! Form::label('pro_estado', 'Estado de la Provincia', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-unlock"></i>
                </div>
                {!! Form::select('pro_estado', [true => 'Habilitado', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
            </div>
        </div>
    </div>

</div>