<div class="col-md-12">
    <div class="row">
        <div class="col-md-7 col-xs-12">
            <div class="form-group {{ $errors->has('met_nombre')?' has-error':'' }}">
                {!! Form::label('met_nombre', 'Descripción de la Meta', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        {!! Form::textarea('met_nombre', null, ['class' => 'form-control', 'placeholder' => 'objetivo específico','rows' => '5']) !!}
                    </div>
                    @if($errors->has('met_nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('met_nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-5col-xs-12">
        <br>
            <div class="form-group">
                <center>
                    <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                    <span class="hint--top  hint--error" aria-label="Cancelar el registro"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
                    <span class="hint--top  hint--error" aria-label="Ver Objetivos/Componentes"><a href="{{ route('objetivo.edit',encrypt($objetivo->solicitudes->id)) }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Objetivos/Componentes</a></span>
                </center>
            </div>
        </div>
    </div>
</div>
{!! Form::hidden('idobjetivo',encrypt($objetivo->solicitudes->id)) !!}