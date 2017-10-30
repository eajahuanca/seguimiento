<div class="col-md-12 col-xs-12">
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_codigo', 'Código del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::text('sol_codigo', Session::get('cite'), ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error16" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error16"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_tipo', 'Tipo de Solicitud', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-server"></i>
						</div>
						{!! Form::select('sol_tipo', ['Invitación' => 'Invitación', 'Convocatoria' => 'Convocatoria'], null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">				
				{!! Form::label('sol_hrsigec', 'Hoja de Ruta (SIGEC)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalSigec"><i class="fa fa-search"></i></a>
						</div>
						{!! Form::text('sol_hrsigec', null, ['class' => 'form-control']) !!} 
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
				{!! Form::label('sol_nombre', 'Nombre del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::text('sol_nombre', null, ['placeholder' => 'Nombre del proyecto', 'class' => 'form-control']) !!} 
					</div>
					<span id="msg-error2" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error2"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>

    <div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_objetivo', 'Objetivo del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::textarea('sol_objetivo', null, ['placeholder' => 'Objetivo del proyecto', 'class' => 'form-control', 'rows' => '4']) !!} 
					</div>
					<span id="msg-error3" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error3"></strong>
					</span>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_justicacion', 'Justificación del Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-bars"></i>
						</div>
						{!! Form::textarea('sol_justicacion', null, ['placeholder' => 'Justificación del proyecto', 'class' => 'form-control', 'rows' => '4']) !!} 
					</div>
					<span id="msg-error4" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error4"></strong>
					</span>
				</div>
			</div>
		</div>
    </div>
	
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('identidad', 'Entidad (UE)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalEntidad"><i class="fa fa-plus"></i></a>
						</div>
						{!! Form::select('identidad', $entidad, null, ['class' => 'form-control select2']) !!}
					</div>
				</div>	
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_sigla', 'Sigla Entidad', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-gg"></i>
						</div>
						{!! Form::text('sol_sigla', null, ['class' => 'form-control', 'id' => 'sol_sigla']) !!} 
					</div>
					<span id="msg-error6" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error6"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('idresponsable', 'Responsable de Proyecto', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						{!! Form::select('idresponsable', $responsable, null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('iddepto', 'Departamento', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-th"></i>
						</div>
						{!! Form::select('iddepto', $departamento , null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('idprovincia', 'Provincia', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalProvincia"><i class="fa fa-plus"></i></a>
						</div>
						{!! Form::select('idprovincia', ['-' => 'Seleccione'], null, ['class' => 'form-control select2']) !!}
					</div>
					<span id="msg-error7" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error7"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_municipio', 'Municipio(s)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalMunicipio"><i class="fa fa-plus"></i></a>
						</div>
						{!! Form::select('sol_municipio[]',[], null, ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => '', 'id' => 'sol_municipio']) !!}
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
				{!! Form::label('sol_montofona', 'Monto Fonabosque (Bs.)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i><b style="font-family:arial;">Bs</b></i>
						</div>
						{!! Form::text('sol_montofona', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error9" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error9"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_montosol', 'Monto Solicitante (Bs.)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i><b style="font-family:arial;">Bs</b></i>
						</div>
						{!! Form::text('sol_montosol', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error10" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error10"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_montootro', 'Monto Otro (Bs.)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i><b style="font-family:arial;">Bs</b></i>
						</div>
						{!! Form::text('sol_montootro', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error11" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error11"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_tiempo', 'Tiempo estimado (Años)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-calendar"></i>
						</div>
						{!! Form::number('sol_tiempo', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error12" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error12"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('idreglamento', 'Guía - Reglamento', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-balance-scale"></i>
						</div>
						{!! Form::select('idreglamento',$reglamento, null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_respaldo', 'Archivo Respaldo', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12 pull-right">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						{!! Form::file('sol_respaldo', ['class' => 'form-control']) !!}
					</div>
					<span id="msg-error13" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error13"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_componente', 'Componente(s)', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<a data-toggle="modal" data-target="#modalComponente"><i class="fa fa-plus"></i></a>
						</div>
						{!! Form::select('sol_componente[]', $componente, [], ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => '', 'id' => 'sol_componente']) !!}
					</div>
					<span id="msg-error15" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error15"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12"></div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('sol_ftecnica', 'Ficha Técnica', ['class' => 'col-md-12 col-xs-12']) !!}
				<div class="col-md-12 col-xs-12 pull-right">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						{!! Form::file('sol_ftecnica', ['class' => 'form-control']) !!}
					</div>
					<span id="msg-error14" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error14"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>