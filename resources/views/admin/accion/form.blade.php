<div class="col-md-12">
    <div class="row">
        <div class="col-md-7 col-xs-6">
            <div class="row">
                <div class="col-md-12 col-xs-6">
                    <div class="form-group {{ $errors->has('acc_desde')?' has-error':'' }}">
                        {!! Form::label('acc_desde', 'Rango de fechas para cumplimiento', ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                {!! Form::text('acc_desde', null, ['class' => 'form-control pull-right', 'id' => 'reservation']) !!}
                            </div>
                            @if($errors->has('acc_desde'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('acc_desde') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-xs-6">
                    <div class="form-group {{ $errors->has('acc_descripcion')?' has-error':'' }}">
                        {!! Form::label('acc_descripcion', 'Descripción de la Acción', ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            <div class="input-group">
                                {!! Form::textarea('acc_descripcion', null, ['class' => 'form-control', 'placeholder' => 'ingrese la accion correspondiente','rows' => '5','width' => '100%']) !!}
                            </div>
                            
                            @if($errors->has('acc_descripcion'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('acc_descripcion') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Objetivo Específico</h3>
                    <br>
                    <p>{!! $objetivo->esp_objetivo !!}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </div>
    </div>
{!! Form::hidden('idobjetivo',$objetivo->id) !!}
{!! Form::hidden('idsolicitud',$objetivo->idsolicitud) !!}
</div>