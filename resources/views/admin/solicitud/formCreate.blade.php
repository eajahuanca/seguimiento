<div class="col-md-12">
    <div class="form-group">
		{!! Form::label('proy_hr', 'Hoja de Ruta', ['class' => 'col-md-12 col-sm-12']) !!}
        <div class="col-md-12 col-sm-12">
            <div class="input-group">
                <div class="input-group-addon">
					<i class="fa fa-bars"></i>
                </div>
                {!! Form::text('proy_hr', null, ['placeholder' => 'Ej. E/2017-0034', 'class' => 'form-control']) !!} 
            </div>
            <span id="msg-error1" class="help-block" style="display:none; color:red" role="alert">
				<strong id="error1"></strong>
            </span>
        </div>
    </div>
	
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('entidad_id', 'Entidad (UE)', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-10 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-server"></i>
						</div>
						{!! Form::select('entidad_id', ['-' => 'Seleccione'], null, ['class' => 'form-control select2']) !!}
					</div>
					<span id="msg-error2" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error2"></strong>
					</span>
				</div>
				<div class="col-md-2 col-xs-12">
					<span class="hint--top  hint--info" aria-label="Registrar Entidad (UE)">
						<a id="btnEntidad" class="btn btn-primary col-xs-12"><i class="fa fa-plus"></i></a>
					</span>
				</div>		
			</div>
		</div>
	
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('unidad_id', 'Unidad Proponente', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-10 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-server"></i>
						</div>
						{!! Form::select('unidad_id', ['-' => 'Seleccione'], null, ['class' => 'form-control select2']) !!}
					</div>
					<span id="msg-error3" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error3"></strong>
					</span>
				</div>
				<div class="col-md-2 col-xs-12">
					<span class="hint--top  hint--info" aria-label="Registrar Unidad Proponente">
						<a id="btnUnidad" class="btn btn-primary col-xs-12"><i class="fa fa-plus"></i></a>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_sigla', 'Sigla Entidad', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-12 col-sm-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-list"></i>
						</div>
						{!! Form::text('proy_sigla', null, ['class' => 'form-control', 'id' => 'proy_sigla']) !!} 
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
				{!! Form::label('departamento_id', 'Departamento', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-th"></i>
						</div>
						{!! Form::select('departamento_id', ['-' => 'Seleccione'], null, ['class' => 'form-control select2']) !!}
					</div>
					<span id="msg-error5" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error5"></strong>
					</span>
				</div>
			</div>
		</div>
	
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('provincia_id', 'Provincias', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-10 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-th"></i>
						</div>
						{!! Form::select('provincia_id', ['-' => 'Seleccione'], null, ['class' => 'form-control select2']) !!}
					</div>
					<span id="msg-error6" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error6"></strong>
					</span>
				</div>
				<div class="col-md-2 col-xs-12">
					<span class="hint--top  hint--info" aria-label="Registrar Provincia">
						<a id="btnProvincia" class="btn btn-primary col-xs-12"><i class="fa fa-plus"></i></a>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('municipio_id', 'Municipio(s)', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-10 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-th"></i>
						</div>
						{!! Form::select('municipio_id[]',['-' => 'Seleccione'], null, ['class' => 'form-control select2', 'multiple' => 'multiple', 'data-placeholder' => 'Seleccione', 'id' => 'municipio_id']) !!}
					</div>
					<span id="msg-error7" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error7"></strong>
					</span>
				</div>
				<div class="col-md-2 col-xs-12">
					<span class="hint--top  hint--info" aria-label="Registrar Municipio">
						<a id="btnMunicipio" class="btn btn-primary col-xs-12"><i class="fa fa-plus"></i></a>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_responsable', 'Responsable de Proyecto', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-user"></i>
						</div>
						{!! Form::select('proy_responsable', $responsable, null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_monto', 'Monto solicitado (Bs.)', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-12 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa"><b>Bs</b></i>
						</div>
						{!! Form::text('proy_monto', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error8"></strong>
					</span>
				</div>
			</div>
		</div>

		<div class="col-md-4 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_tiempo', 'Tiempo estimado (Años)', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-12 col-sm-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-clock-o"></i>
						</div>
						{!! Form::number('proy_tiempo', null, ['class' => 'form-control']) !!} 
					</div>
					<span id="msg-error9" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error9"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_estado', 'Estado del Proyecto', ['class' => 'col-md-12 col-sm-12']) !!}
				<div class="col-md-8 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-unlock"></i>
						</div>
						{!! Form::select('proy_estado', [true => 'En Solicitud', false => 'Devuelto'], null, ['class' => 'form-control select2']) !!}
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6 col-xs-12">
			<div class="form-group">
				{!! Form::label('proy_archivo', 'Archivo Respaldo', ['class' => 'col-md-12 col-sm-12 text-right']) !!}
				<div class="col-md-8 col-xs-12 pull-right">
					<div class="input-group">
						<div class="input-group-addon">
							<i class="fa fa-file-pdf-o"></i>
						</div>
						{!! Form::file('proy_archivo', ['class' => 'form-control']) !!}
					</div>
					<span id="msg-error10" class="help-block" style="display:none; color:red" role="alert">
						<strong id="error10"></strong>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>