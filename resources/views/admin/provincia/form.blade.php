<div class="col-md-12">

	<div class="form-group {{ $errors->has('departamento_id')?' has-error':'' }}">
        {!! Form::label('departamento_id', 'Seleccione el Departamento', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-bullseye"></i>
                </div>
                {!! Form::select('departamento_id', $departamento, null, ['class' => 'form-control select2']) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('prov_nombre')?' has-error':'' }}">
        {!! Form::label('prov_nombre', 'Nombre de la Provincia', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-object-ungroup"></i>
                </div>
                {!! Form::text('prov_nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la provincia']) !!}
            </div>
            @if($errors->has('prov_nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('prov_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>

	<div class="form-group {{ $errors->has('prov_estado')?' has-error':'' }}">
        {!! Form::label('prov_estado', 'Estado de la Provincia', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-unlock"></i>
                </div>
                {!! Form::select('prov_estado', [true => 'Habilitado', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
            </div>
        </div>
    </div>

</div>