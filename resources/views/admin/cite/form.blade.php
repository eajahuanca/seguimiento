<div class="col-md-12">

    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div class="form-group {{ $errors->has('ent_nombre')?' has-error':'' }}">
                {!! Form::label('ent_nombre', 'Nombre de la Entidad (UE)', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bars"></i>
                        </div>
                        {!! Form::text('ent_nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la entidad']) !!}
                    </div>
                    @if($errors->has('ent_nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ent_nombre') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xs-12">
            <div class="form-group {{ $errors->has('ent_sigla')?' has-error':'' }}">
                {!! Form::label('ent_sigla', 'Sigla de la Entidad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-bullseye"></i>
                        </div>
                        {!! Form::text('ent_sigla', null, ['class' => 'form-control', 'placeholder' => 'Sigla de la entidad']) !!}
                    </div>
                    @if($errors->has('ent_sigla'))
                        <span class="help-block">
                            <strong>{{ $errors->first('ent_sigla') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
 
        <div class="col-md-5 col-xs-12">
            <div class="form-group {{ $errors->has('ent_estado')?' has-error':'' }}">
                {!! Form::label('ent_estado', 'Estado de la Entidad', ['class' => 'col-md-12']) !!}
                <div class="col-md-12">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-unlock"></i>
                        </div>
                        {!! Form::select('ent_estado', [true => 'Activo', false => 'Bloqueado'], null, ['class' => 'form-control select2']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>