<div class="col-md-12">

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="form-group {{ $errors->has('reg_nombre')?' has-error':'' }}">
                {!! Form::label('reg_nombre', 'Nombre del Reglamento', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bars"></i>
                        </div>
                        {!! Form::text('reg_nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del reglamento']) !!}
                    </div>
                    @if($errors->has('reg_nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('reg_nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-12 col-xs-12">
            <div class="form-group {{ $errors->has('reg_descripcion')?' has-error':'' }}">
                {!! Form::label('reg_descripcion', 'Descripción del Reglamento - Guía', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bars"></i>
                        </div>
                        {!! Form::textarea('reg_descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion del reglamento', 'rows' => 5]) !!}
                    </div>
                    @if($errors->has('reg_descripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('reg_descripcion') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-5 col-xs-12">
            <div class="form-group {{ $errors->has('reg_archivo')?' has-error':'' }}">
                {!! Form::label('reg_archivo', 'Archivo (Reglamento -Guía)', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <?php error_reporting(0); ?>
                            @if($reglamento->reg_archivo)
                            <a href="{{ asset($reglamento->reg_archivo) }}" target="_blank"><img src="{{ asset('plugins/login/img/pdfico.png') }}" width="15px" height="18px"/></a>
                            @else
                            <i class="fa fa-file-pdf-o"></i>
                            @endif
                        </div>
                        {!! Form::file('reg_archivo', null, ['class' => 'form-control']) !!}
                    </div>
                    @if($errors->has('reg_archivo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('reg_archivo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5 col-xs-12">
            <div class="form-group {{ $errors->has('reg_estado')?' has-error':'' }}">
                {!! Form::label('reg_estado', 'Estado de la Entidad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-unlock"></i>
                        </div>
                        {!! Form::select('reg_estado', [true => 'Activo', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>