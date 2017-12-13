<div class="col-md-12">

	<div class="form-group {{ $errors->has('idprovincia')?' has-error':'' }}">
        {!! Form::label('idprovincia', 'Seleccione la Provincia', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-object-ungroup"></i>
                </div>
                {!! Form::select('idprovincia', $provincia, null, ['class' => 'form-control select2']) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('mun_nombre')?' has-error':'' }}">
        {!! Form::label('mun_nombre', 'Nombre del Municipio', ['class' => 'col-md-12']) !!}
        <div class="col-md-12">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-paper-plane-o"></i>
                </div>
                {!! Form::text('mun_nombre', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del municipio']) !!}
            </div>
            @if($errors->has('mun_nombre'))
                <span class="help-block">
                    <strong>{{ $errors->first('mun_nombre') }}</strong>
                </span>
            @endif
        </div>
    </div>

	<div class="form-group {{ $errors->has('mun_estado')?' has-error':'' }}">
        {!! Form::label('mun_estado', 'Estado del Municipio', ['class' => 'col-md-12']) !!}
        <div class="col-md-4">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-unlock"></i>
                </div>
                {!! Form::select('mun_estado', [true => 'Habilitado', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
            </div>
            @if($errors->has('mun_estado'))
                <span class="help-block">
                    <strong>{{ $errors->first('mun_estado') }}</strong>
                </span>
            @endif
        </div>
    </div>

</div>