<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group {{ $errors->has('act_nombre')?' has-error':'' }}">
                {!! Form::label('act_nombre', 'Descripción de la Actividad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        {!! Form::textarea('act_nombre', null, ['class' => 'form-control', 'placeholder' => 'objetivo específico','rows' => '5']) !!}
                    </div>
                    @if($errors->has('act_nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('act_nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="form-group {{ $errors->has('act_obs')?' has-error':'' }}">
                {!! Form::label('act_obs', 'Observaciones', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        {!! Form::textarea('act_obs', null, ['class' => 'form-control', 'placeholder' => 'componentes','rows' => '5']) !!}
                    </div>
                    @if($errors->has('act_obs'))
                        <span class="help-block">
                            <strong>{{ $errors->first('act_obs') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group {{ $errors->has('act_cantidad')?' has-error':'' }}">
                {!! Form::label('act_cantidad', 'Cantidad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
                        {!! Form::text('act_cantidad', null, ['class' => 'form-control', 'placeholder' => 'cantidad']) !!}
                    </div>
                    @if($errors->has('act_cantidad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('act_cantidad') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12">
            <div class="form-group {{ $errors->has('act_otro')?' has-error':'' }}">
                {!! Form::label('act_otro', 'Otros', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
                        {!! Form::text('act_otro', null, ['class' => 'form-control', 'placeholder' => 'otro dato si corresponde']) !!}
                    </div>
                    @if($errors->has('act_otro'))
                        <span class="help-block">
                            <strong>{{ $errors->first('act_otro') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="form-group {{ $errors->has('act_unidad')?' has-error':'' }}">
                {!! Form::label('act_unidad', 'Cantidad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
							<i class="fa fa-lock"></i>
						</div>
                        {!! Form::select('act_unidad', ['HECTAREAS' => 'HECTAREAS','M2' => 'M2', 'PIEZAS' => 'PIEZAS', 'UNIDADES' => 'UNIDADES'], null, ['class' => 'form-control select2']) !!}
                    </div>
                    @if($errors->has('act_unidad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('act_unidad') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('idmeta',encrypt($meta->id)) !!}