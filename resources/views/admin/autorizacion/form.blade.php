<div class="row">
{!! Form::model($desembolso,['route' => ['autorizacion.update',encrypt($desembolso->id)], 'method' => 'PUT', 'class' => 'form-horizontal', 'files' => true]) !!}
<div class="col-md-12 
col-xs-12">
    {!! Form::hidden('idsolicitud', encrypt($solicitud->id)) !!}
    {!! Form::hidden('idcodigo', $solicitud->sol_codigo) !!}
    {!! Form::hidden('idcronograma', encrypt($cronograma->id)) !!}
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa "><b>Bs</b></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>PRIMER DESEMBOLSO</b></span>
                    <span><b>{{ number_format($cronograma->cro_desembolso,2,',','.') }}</b></span><br>
                </div>
            </div>
		</div>
		<div class="col-md-4 col-xs-12">
			<div class="form-group {{ $errors->has('des_monto_aprobado')?' has-error':'' }}">
				{!! Form::label('des_monto_aprobado', 'Desembolso Aprobado', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa "><b>Bs</b></i>
						</div>
						{!! Form::text('des_monto_aprobado', null, ['class' => 'form-control']) !!}
					</div>
                    @if($errors->has('des_monto_aprobado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('des_monto_aprobado') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
        <div class="col-md-4 col-xs-12">
			<div class="form-group {{ $errors->has('des_archivo_aprobado')?' has-error':'' }}">
				{!! Form::label('des_archivo_aprobado', 'Archivo de Aprobación', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						{!! Form::file('des_archivo_aprobado', null, ['class' => 'form-control']) !!}
					</div>
                    @if($errors->has('des_archivo_aprobado'))
                        <span class="help-block">
                            <strong>{{ $errors->first('des_archivo_aprobado') }}</strong>
                        </span>
                    @endif
				</div>
			</div>
		</div>
	</div>
    <div class="form-group">
        <center>
            <span class="hint--top  hint--success" aria-label="Guardar Solicitud"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
            <span class="hint--top  hint--error" aria-label="Cancelar"><a href="{{ URL::previous() }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
        </center>
    </div>
</div>
{!! Form::close() !!}
</div>