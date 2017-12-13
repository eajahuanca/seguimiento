<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 col-xs-12">
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

        <div class="col-md-6 col-xs-12">
            <div class="form-group {{ $errors->has('esp_componente')?' has-error':'' }}">
                {!! Form::label('esp_meta', 'Componente', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        {!! Form::textarea('esp_componente', null, ['class' => 'form-control', 'placeholder' => 'componentes','rows' => '5']) !!}
                    </div>
                    @if($errors->has('esp_componente'))
                        <span class="help-block">
                            <strong>{{ $errors->first('esp_componente') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('idsolicitud',encrypt($solicitud->id)) !!}
{!! Form::hidden('idcodigo',$solicitud->sol_codigo) !!}