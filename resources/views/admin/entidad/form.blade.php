<div class="col-md-12">

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('param_entidad')?' has-error':'' }}">
                {!! Form::label('param_entidad', 'Nombre de la Entidad (UE)', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <a data-toggle="modal" data-target="#modalEntidad"><i class="fa fa-search"></i></a>
                        </div>
                        {!! Form::text('param_entidad', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la entidad']) !!}
                    </div>
                    @if($errors->has('param_entidad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('param_entidad') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('param_sigla')?' has-error':'' }}">
                {!! Form::label('param_sigla', 'Sigla de la Entidad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        {!! Form::text('param_sigla', null, ['class' => 'form-control', 'placeholder' => 'Sigla de la entidad']) !!}
                    </div>
                    @if($errors->has('param_sigla'))
                        <span class="help-block">
                            <strong>{{ $errors->first('param_sigla') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
            
        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('param_unidad')?' has-error':'' }}">
                {!! Form::label('param_unidad', 'Unidad de la Entidad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <a data-toggle="modal" data-target="#modalUnidad"><i class="fa fa-search"></i></a>
                        </div>
                        {!! Form::text('param_unidad', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la unidad']) !!}
                    </div>
                    @if($errors->has('param_unidad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('param_unidad') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>    
    </div>

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('param_depto')?' has-error':'' }}">
                {!! Form::label('param_depto', 'Departamento', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-list"></i>
                        </div>
                        {!! Form::select('param_depto', ['La Paz' => 'La Paz',
                                                         'Oruro' => 'Oruro',
                                                         'Cochabamba' => 'Cochabamba',
                                                         'Potosi' => 'Potosi',
                                                         'Chuquisaca' => 'Chuquisaca',
                                                         'Santa Cruz' => 'Santa Cruz',
                                                         'Tarija' => 'Tarija',
                                                         'Beni' => 'Beni',
                                                         'Pando' => 'Pando'], 
                                                        null, ['class' => 'form-control select2']) !!}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('param_ciudad')?' has-error':'' }}">
                {!! Form::label('param_ciudad', 'Ciudad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <a onclick="entidadClick()"><i class="fa fa-search"></i></a>
                        </div>
                        {!! Form::text('param_ciudad', null, ['class' => 'form-control', 'placeholder' => 'Ciudad']) !!}
                    </div>
                    @if($errors->has('param_ciudad'))
                        <span class="help-block">
                            <strong>{{ $errors->first('param_ciudad') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div> 

        <div class="col-md-4 col-xs-12">
             <div class="form-group {{ $errors->has('param_provincia')?' has-error':'' }}">
                {!! Form::label('param_provincia', 'Provincia', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <a onclick="entidadClick()"><i class="fa fa-search"></i></a>
                        </div>
                        {!! Form::text('param_provincia', null, ['class' => 'form-control', 'placeholder' => 'Provincia']) !!}
                    </div>
                    @if($errors->has('param_provincia'))
                        <span class="help-block">
                            <strong>{{ $errors->first('param_provincia') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-xs-12">
             <div class="form-group {{ $errors->has('param_municipio')?' has-error':'' }}">
                {!! Form::label('param_municipio', 'Municipio', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <a onclick="entidadClick()"><i class="fa fa-search"></i></a>
                        </div>
                        {!! Form::text('param_municipio', null, ['class' => 'form-control', 'placeholder' => 'Municipio']) !!}
                    </div>
                    @if($errors->has('param_municipio'))
                        <span class="help-block">
                            <strong>{{ $errors->first('param_municipio') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12"></div>

        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('param_estado')?' has-error':'' }}">
                {!! Form::label('param_estado', 'Estado de la Entidad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-unlock"></i>
                        </div>
                        {!! Form::select('param_estado', [true => 'Activo', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>