<div class="col-md-12">

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="form-group {{ $errors->has('ar_archivo')?' has-error':'' }}">
                {!! Form::label('ar_archivo', 'Archivo', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bars"></i>
                        </div>
                        {!! Form::file('ar_archivo', null, ['class' => 'form-control']) !!}
                    </div>
                    @if($errors->has('ar_archivo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ar_archivo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="form-group {{ $errors->has('ar_detalle')?' has-error':'' }}">
                {!! Form::label('ar_detalle', 'Pequeña Descripción del Archivo', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        {!! Form::text('ar_detalle', null, ['class' => 'form-control']) !!}
                    </div>
                    @if($errors->has('ar_detalle'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ar_detalle') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        {!! Form::hidden('idsolicitud',$idsolicitud) !!}
        {!! Form::hidden('idcodigo',$idcodigo) !!}
    </div>

</div>