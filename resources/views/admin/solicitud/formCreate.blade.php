<div class="col-md-12 col-xs-12">
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_codigo', 'Código del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::text('proy_codigo', Session::get('cite'), ['class' => 'form-control', 'disabled' => 'true']) !!} 
					</div>
					<span id="msg-error1" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error1"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_tipo', 'Tipo de Solicitud', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-server"></i>
						</div>
						{!! Form::select('proy_tipo', ['Invitación' => 'Invitación', 'Convocatoria' => 'Convocatoria'], null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">				
				{!! Form::label('proy_hrsigec', 'Hoja de Ruta (SIGEC)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalSigec"><i class="fa fa-search"></i></a>
						</div>
						{!! Form::text('proy_hrsigec', null, ['class' => 'form-control', 'disabled' => 'true']) !!} 
					</div>
					<span id="msg-error1" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error1"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_nombre', 'Nombre del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::text('proy_nombre', null, ['placeholder' => 'Nombre del proyecto', 'class' => 'form-control']) !!} 
					</div>
					<span id="msg-error1" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error1"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>

    <div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_objetivo', 'Objetivo del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::textarea('proy_objetivo', null, ['placeholder' => 'Objetivo del proyecto', 'class' => 'form-control', 'rows' => '4']) !!} 
					</div>
					<span id="msg-error1" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error1"></strong>
					</span>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_justificacion', 'Justificación del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::textarea('proy_justificacion', null, ['placeholder' => 'Justificación del proyecto', 'class' => 'form-control', 'rows' => '4']) !!} 
					</div>
					<span id="msg-error1" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error1"></strong>
					</span>
				</div>
			</div>
		</div>
    </div>
	
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_entidad', 'Entidad (UE)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalEntidad"><i class="fa fa-plus"></i></a>
						</div>
						{!! Form::select('proy_entidad', $entidad, null, ['class' => 'form-control select2']) !!}
					</div>
				</div>	
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_sigla', 'Sigla Entidad', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-gg"></i>
						</div>
						{!! Form::text('proy_sigla', null, ['class' => 'form-control', 'id' => 'proy_sigla', 'disabled' => 'true']) !!} 
					</div>
					<span id="msg-error4" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error4"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_unidad', 'Unidad', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalUnidad"><i class="fa fa-plus"></i></a>
						</div>
						{!! Form::select('proy_unidad', ['-' => 'Seleccione'], null, ['class' => 'form-control select2']) !!}
					</div>
					<span id="msg-error3" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error3"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_depto', 'Departamento', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-th"></i>
						</div>
						{!! Form::select('proy_depto', ['La Paz' => 'La Paz','Oruro' => 'Oruro','Potosi' => 'Potosi',
											'Tarija' => 'Tarija','Santa Cruz' => 'Santa Cruz','Beni' => 'Beni','Cochabamba' => 'Cochabamba','Pando' => 'Pando','Chuquisaca' => 'Chuquisaca'], null, ['class' => 'form-control select2']) !!}
					</div>
					<span id="msg-error5" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error5"></strong>
					</span>
				</div>
			</div>
		</div>
	
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_provincia', 'Provincia', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalProvincia"><i class="fa fa-plus"></i></a>
						</div>
						{!! Form::select('proy_provincia', ['-' => 'Seleccione'], null, ['class' => 'form-control select2']) !!}
					</div>
					<span id="msg-error6" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error6"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_municipio', 'Municipio(s)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalMunicipio"><i class="fa fa-plus"></i></a>
						</div>
						{!! Form::select('proy_municipio[]',['-' => 'Seleccione'], null, ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Seleccione', 'id' => 'proy_municipio']) !!}
					</div>
					<span id="msg-error7" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error7"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('id_responsable', 'Responsable de Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						{!! Form::select('id_responsable', $responsable, null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_montofona', 'Monto Fonabosque (Bs.)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i><b style="font-family:arial;">Bs</b></i>
						</div>
						{!! Form::text('proy_montofona', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error8"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_montosol', 'Monto Solicitante (Bs.)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i><b style="font-family:arial;">Bs</b></i>
						</div>
						{!! Form::text('proy_montosol', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error8"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_tiempo', 'Tiempo estimado (Años)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						{!! Form::number('proy_tiempo', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error9" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error9"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_estado', 'Estado del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-unlock"></i>
						</div>
						{!! Form::select('proy_estado', [true => 'En Solicitud', false => 'Devuelto'], null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_respaldo', 'Archivo Respaldo', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12 pull-right">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						{!! Form::file('proy_respaldo', ['class' => 'form-control']) !!}
					</div>
					<span id="msg-error10" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error10"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>