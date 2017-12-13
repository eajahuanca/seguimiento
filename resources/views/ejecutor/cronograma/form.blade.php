<div class="row">
{!! Form::open(['route' => 'ecronograma.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
<div class="col-md-12 col-xs-12">
    {!! Form::hidden('idsolicitud', encrypt($solicitud->id)) !!}
    {!! Form::hidden('idcite', $solicitud->sol_codigo) !!}
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group {{ $errors->has('eje_mes')?' has-error':'' }}">
				{!! Form::label('eje_mes', 'Mes', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-server"></i>
						</div>
						{!! Form::select('eje_mes', ['MES 1' => 'MES 1', 'MES 2' => 'MES 2', 'MES 3' => 'MES 3', 'MES 4' => 'MES 4', 'MES 5' => 'MES 5', 'MES 6' => 'MES 6', 'MES 7' => 'MES 7', 'MES 8' => 'MES 8', 'MES 9' => 'MES 9', 'MES 10' => 'MES 10', 'MES 11' => 'MES 11', 'MES 12' => 'MES 12', 'MES 13' => 'MES 13'], null, ['class' => 'form-control select2']) !!}
					</div>
                    @if($errors->has('eje_mes'))
                        <span class="help-block">
                            <strong>{{ $errors->first('eje_mes') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
		<div class="col-md-4 col-xs-12">
			<div class="form-group {{ $errors->has('eje_corresponde')?' has-error':'' }}">
				{!! Form::label('eje_corresponde', 'Corresponde A', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-server"></i>
						</div>
						{!! Form::select('eje_corresponde', ['ENERO/2017' => 'ENERO/2017', 'FEBRERO/2017' => 'FEBRERO/2017', 'MARZO/2017' => 'MARZO/2017', 'ABRIL/2017' => 'ABRIL/2017', 'MAYO/2017' => 'MAYO/2017', 'JUNIO/2017' => 'JUNIO/2017', 'JULIO/2017' => 'JULIO/2017', 'AGOSTO/2017' => 'AGOSTO/2017', 'SEPTIEMBRE/2017' => 'SEPTIEMBRE/2017', 'OCTUBRE/2017' => 'OCTUBRE/2017', 'NOVIEMBRE/2017' => 'NOVIEMBRE/2017', 'DICIEMBRE/2017' => 'DICIEMBRE/2017', 'ENERO/2018' => 'ENERO/2018'], null, ['class' => 'form-control select2']) !!}
					</div>
                    @if($errors->has('eje_corresponde'))
                        <span class="help-block">
                            <strong>{{ $errors->first('eje_corresponde') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8 col-xs-12">
			<div class="form-group {{ $errors->has('eje_descripcion')?' has-error':'' }}">
				{!! Form::label('eje_descripcion', 'Descripción', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						{!! Form::textarea('eje_descripcion', null, ['class' => 'form-control', 'rows' => 6]) !!} 
					</div>
                    @if($errors->has('eje_descripcion'))
                        <span class="help-block">
                            <strong>{{ $errors->first('eje_descripcion') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
        <div class="col-md-4 col-xs-12">
            <div class="form-group">
                    <span class="hint--top  hint--success" aria-label="Guardar Cronograma"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                    <span class="hint--top  hint--error" aria-label="Cancelar"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
            </div>
        </div>
	</div>
</div>
{!! Form::close() !!}
</div>