{!! Form::open(['route' => 'documento.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}
<div class="col-md-12 col-xs-12">
    {!! Form::hidden('idsolicitud', encrypt($solicitud->id)) !!}
    {!! Form::hidden('idcodigo', $solicitud->sol_codigo) !!}
    {!! Form::hidden('doc_tipo', $tipo) !!}
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="form-group {{ $errors->has('doc_codigo')?' has-error':'' }}">
				{!! Form::label('doc_codigo', 'Codigo (si es necesario)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::text('doc_codigo', 'SIN CODIGO', ['placeholder' => 'ingrese codigo si es necesario', 'class' => 'form-control']) !!} 
					</div>
                    @if($errors->has('doc_codigo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('doc_codigo') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-4 col-xs-12">
			<div class="form-group {{ $errors->has('doc_req')?' has-error':'' }}">
				{!! Form::label('doc_req', 'Requisito ?', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::select('doc_req', ['INDISPENSABLE' => 'INDISPENSABLE', 'OPCIONAL' => 'OPCIONAL'], null, ['class' => 'form-control select2']) !!}
					</div>
                    @if($errors->has('doc_req'))
                        <span class="help-block">
                            <strong>{{ $errors->first('doc_req') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="form-group {{ $errors->has('doc_archivo')?' has-error':'' }}">
				{!! Form::label('doc_archivo', 'Documento Correspondiente', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						{!! Form::file('doc_archivo', null, ['class' => 'form-control']) !!} 
					</div>
                    @if($errors->has('doc_archivo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('doc_archivo') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-4 col-xs-12">
			<div class="form-group {{ $errors->has('doc_cumple')?' has-error':'' }}">
				{!! Form::label('doc_cumple', 'Cumple con la documentación ?', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						{!! Form::checkbox('doc_cumple', null, true,['class' => 'flat-red']) !!} 
					</div>
                    @if($errors->has('doc_cumple'))
                        <span class="help-block">
                            <strong>{{ $errors->first('doc_cumple') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="form-group {{ $errors->has('doc_obs')?' has-error':'' }}">
				{!! Form::label('doc_obs', 'Observaciones', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::textarea('doc_obs', null, ['class' => 'form-control', 'placeholder' => 'observaciones','rows' => '4']) !!} 
					</div>
                    @if($errors->has('doc_obs'))
                        <span class="help-block">
                            <strong>{{ $errors->first('doc_obs') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
	</div>
    <div class="form-group">
        <center>
            <span class="hint--top  hint--success" aria-label="Guardar Documento"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
            <span class="hint--top  hint--error" aria-label="Cancelar"><a href="{{ URL::previous() }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
        </center>
    </div>
</div>
{!! Form::close() !!}