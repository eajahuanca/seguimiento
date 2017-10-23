<div class="col-md-12">

    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div class="form-group {{ $errors->has('car_nombre')?' has-error':'' }}">
                {!! Form::label('car_nombre', 'Nombre del Cargo', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bars"></i>
                        </div>
                        {!! Form::text('car_nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del cargo']) !!}
                    </div>
                    @if($errors->has('car_nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('car_nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
 
        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('car_estado')?' has-error':'' }}">
                {!! Form::label('car_estado', 'Estado del cargo', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-unlock"></i>
                        </div>
                        {!! Form::select('car_estado', [true => 'Activo', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>