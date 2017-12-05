<div class="row">
{!! Form::open(['route' => 'cronograma.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
<div class="col-md-12 col-xs-12">
    {!! Form::hidden('idsolicitud', encrypt($solicitud->id)) !!}
    {!! Form::hidden('idcodigo', $solicitud->sol_codigo) !!}
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="form-group {{ $errors->has('cro_mes')?' has-error':'' }}">
				{!! Form::label('cro_mes', 'Mes', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-server"></i>
						</div>
						{!! Form::select('cro_mes', ['MES 1' => 'MES 1', 'MES 2' => 'MES 2', 'MES 3' => 'MES 3', 'MES 4' => 'MES 4', 'MES 5' => 'MES 5', 'MES 6' => 'MES 6', 'MES 7' => 'MES 7', 'MES 8' => 'MES 8', 'MES 9' => 'MES 9', 'MES 10' => 'MES 10', 'MES 11' => 'MES 11', 'MES 12' => 'MES 12', 'MES 13' => 'MES 13',], null, ['class' => 'form-control select2']) !!}
					</div>
                    @if($errors->has('cro_mes'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cro_mes') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="form-group {{ $errors->has('cro_mes_correspondiente')?' has-error':'' }}">
				{!! Form::label('cro_mes_correspondiente', 'Corresponde A', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-server"></i>
						</div>
						{!! Form::select('cro_mes_correspondiente', ['ENERO/2017' => 'ENERO/2017', 'FEBRERO/2017' => 'FEBRERO/2017', 'MARZO/2017' => 'MARZO/2017', 'ABRIL/2017' => 'ABRIL/2017', 'MAYO/2017' => 'MAYO/2017', 'JUNIO/2017' => 'JUNIO/2017', 'JULIO/2017' => 'JULIO/2017', 'AGOSTO/2017' => 'AGOSTO/2017', 'SEPTIEMBRE/2017' => 'SEPTIEMBRE/2017', 'OCTUBRE/2017' => 'OCTUBRE/2017', 'NOVIEMBRE/2017' => 'NOVIEMBRE/2017', 'DICIEMBRE/2017' => 'DICIEMBRE/2017', 'ENERO/2018' => 'ENERO/2018',], null, ['class' => 'form-control select2']) !!}
					</div>
                    @if($errors->has('cro_mes_correspondiente'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cro_mes_correspondiente') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="form-group {{ $errors->has('cro_desembolso')?' has-error':'' }}">
				{!! Form::label('cro_desembolso', 'Desembolso (si corresponde)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa "><b>Bs</b></i>
						</div>
						{!! Form::text('cro_desembolso', '0.00', ['placeholder' => 'ingrese desembolso si corresponde', 'class' => 'form-control']) !!} 
					</div>
                    @if($errors->has('cro_desembolso'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cro_desembolso') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="form-group {{ $errors->has('cro_fecha_desembolso')?' has-error':'' }}">
				{!! Form::label('cro_fecha_desembolso', 'Fecha de Desembolso (si corresponde)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						{!! Form::text('cro_fecha_desembolso', null, ['class' => 'form-control']) !!} 
					</div>
                    @if($errors->has('cro_fecha_desembolso'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cro_fecha_desembolso') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="form-group {{ $errors->has('cro_programado')?' has-error':'' }}">
				{!! Form::label('cro_programado', 'Monto Programado (Bs.)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa "><b>Bs</b></i>
						</div>
						{!! Form::text('cro_programado', null, ['class' => 'form-control']) !!} 
					</div>
                    @if($errors->has('cro_programado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cro_programado') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
	</div>
    <div class="form-group">
        <center>
            <span class="hint--top  hint--success" aria-label="Guardar Cronograma"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
            <span class="hint--top  hint--error" aria-label="Cancelar"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
        </center>
    </div>
</div>
{!! Form::close() !!}
</div>