<div class="row">
{!! Form::open(['route' => 'desembolso1.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}
<div class="col-md-12 col-xs-12">
    {!! Form::hidden('idsolicitud', encrypt($solicitud->id)) !!}
    {!! Form::hidden('idcodigo', $solicitud->sol_codigo) !!}
    {!! Form::hidden('idcronograma', encrypt($cronograma->id)) !!}
    {!! Form::hidden('des_monto_solicitado', encrypt($cronograma->cro_desembolso)) !!}
	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa "><b>Bs</b></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>PRIMER DESEMBOLSO</b></span>
                    <span><b>{{ number_format($cronograma->cro_desembolso,2,',','.') }}</b></span><br>
                </div>
            </div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="form-group {{ $errors->has('des_archivo_solicitud')?' has-error':'' }}">
				{!! Form::label('des_archivo_solicitud', 'Archivo Solicitud', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						{!! Form::file('des_archivo_solicitud', null, ['class' => 'form-control']) !!}
					</div>
                    @if($errors->has('des_archivo_solicitud'))
                        <span class="help-block">
                            <strong>{{ $errors->first('des_archivo_solicitud') }}</strong>
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