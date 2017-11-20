<div class="col-md-12">
    <div class="row">
        <div class="col-md-4 col-xs-6">
            <div class="form-group {{ $errors->has('esp_objetivo')?' has-error':'' }}">
                {!! Form::label('esp_objetivo', 'Objetivo Específico', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        {!! Form::textarea('esp_objetivo', null, ['class' => 'form-control', 'placeholder' => 'objetivo específico','rows' => '5']) !!}
                    </div>
                    @if($errors->has('esp_objetivo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('esp_objetivo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-6">
            <div class="form-group {{ $errors->has('esp_meta')?' has-error':'' }}">
                {!! Form::label('esp_meta', 'Metas a cumplir', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        {!! Form::textarea('esp_meta', null, ['class' => 'form-control', 'placeholder' => 'metas','rows' => '5']) !!}
                    </div>
                    @if($errors->has('esp_meta'))
                        <span class="help-block">
                            <strong>{{ $errors->first('esp_meta') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-6">
            <div class="form-group {{ $errors->has('esp_resultado')?' has-error':'' }}">
                {!! Form::label('esp_resultado', 'Resultados', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        {!! Form::textarea('esp_resultado', null, ['class' => 'form-control textarea', 'placeholder' => 'resultados','rows' => '5']) !!}
                    </div>
                    @if($errors->has('esp_resultado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('esp_resultado') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('idsolicitud',$solicitud->id) !!}
{!! Form::hidden('idcodigo',$solicitud->sol_codigo) !!}