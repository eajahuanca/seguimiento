<div class="col-md-12">

    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div class="form-group {{ $errors->has('ar_nombre')?' has-error':'' }}">
                {!! Form::label('ar_nombre', 'Nombre del Area', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bars"></i>
                        </div>
                        {!! Form::text('ar_nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del area']) !!}
                    </div>
                    @if($errors->has('ar_nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ar_nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
 
        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('ar_estado')?' has-error':'' }}">
                {!! Form::label('ar_estado', 'Estado del Area', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-unlock"></i>
                        </div>
                        {!! Form::select('ar_estado', [true => 'Activo', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>