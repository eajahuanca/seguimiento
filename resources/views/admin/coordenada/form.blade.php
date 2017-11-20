<div class="col-md-12">
    <div class="row">
        <div class="col-md-7 col-xs-6">
            <div class="row">
                <div class="col-md-6 col-xs-6">
                    <div class="form-group {{ $errors->has('coor_x_origin')?' has-error':'' }}">
                        {!! Form::label('coor_x_origin', 'Coordenada X', ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                {!! Form::number('coor_x_origin', null, ['class' => 'form-control pull-right']) !!}
                            </div>
                            @if($errors->has('coor_x_origin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('coor_x_origin') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="form-group {{ $errors->has('coor_y_origin')?' has-error':'' }}">
                        {!! Form::label('coor_y_origin', 'Coordenada Y', ['class' => 'col-md-12']) !!}
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                {!! Form::number('coor_y_origin', null, ['class' => 'form-control pull-right']) !!}
                            </div>
                            @if($errors->has('coor_y_origin'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('coor_y_origin') }}</strong>
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