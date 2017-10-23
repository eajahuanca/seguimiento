<div class="col-md-12">

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="form-group {{ $errors->has('com_nombre')?' has-error':'' }}">
                {!! Form::label('com_nombre', 'Nombre del componente', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bars"></i>
                        </div>
                        {!! Form::text('com_nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del componente']) !!}
                    </div>
                    @if($errors->has('com_nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('com_nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xs-12">
            <div class="form-group {{ $errors->has('com_descripcion')?' has-error':'' }}">
                {!! Form::label('com_descripcion', 'Descripcion del Componente', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        {!! Form::text('com_descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion']) !!}
                    </div>
                    @if($errors->has('com_descripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('com_descripcion') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
 
        <div class="col-md-5 col-xs-12">
            <div class="form-group {{ $errors->has('com_estado')?' has-error':'' }}">
                {!! Form::label('com_estado', 'Estado del Componente', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-unlock"></i>
                        </div>
                        {!! Form::select('com_estado', [true => 'Activo', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>