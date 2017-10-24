<!--Modal para Buscar Hoja de Ruta-->
<div class="modal fade" id="modalSigec" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Buscar Hoja de Ruta</h4>
            </div>
            <div class="modal-body">
                <table id="example" class="table table-striped table-bordered tblSigec" cellspacing="0" width="100%">
                    <thead>
                        <tr class="btn-success">
                            <th style="text-align: center !important;">HR</th>
                            <th style="text-align: center !important;">Remitente</th>
                            <th style="text-align: center !important;">Cite</th>
                            <th style="text-align: center !important;">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sigec as $itemSigec)
                        <tr id="{{ $itemSigec->nur }}">
                            <td class="tdhr" id="td">{{ $itemSigec->nur }}</td>
                            <td>{{ $itemSigec->nombre_remitente }}</td>
                            <td>{{ $itemSigec->codigo }}</td>
                            <td>{{ $itemSigec->fecha_creacion }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" >Cerrar</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>-->
            </div>
        </div>
    </div>
</div>

<!--Modal para registrar Nueva Entidad-->
<div class="modal fade" id="modalEntidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Nueva Entidad</h4>
            </div>
            <div class="modal-body">
            
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('ent_nombre', 'Nombre de la Entidad', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::text('ent_nombre', null, ['class' => 'form-control']) !!} 
                                </div>
                                <span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
                                    <strong id="error8"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('ent_sigla', 'Sigla', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-list"></i>
                                    </div>
                                    {!! Form::text('ent_sigla', null, ['class' => 'form-control']) !!} 
                                </div>
                                <span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
                                    <strong id="error8"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal para registrar Nueva Unidad-->
<div class="modal fade" id="modalUnidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Nueva Unidad</h4>
            </div>
            <div class="modal-body">
            
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('uni_nombre', 'Nombre de la Unidad', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::text('uni_nombre', null, ['class' => 'form-control']) !!} 
                                </div>
                                <span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
                                    <strong id="error8"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal para registrar Nueva Provincia-->
<div class="modal fade" id="modalProvincia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Nueva Provincia</h4>
            </div>
            <div class="modal-body">
            
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('prov_nombre', 'Nombre de la Provincia', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::text('prov_nombre', null, ['class' => 'form-control']) !!} 
                                </div>
                                <span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
                                    <strong id="error8"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal para registrar Nueva Municipios-->
<div class="modal fade" id="modalMunicipio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Nuevo Municipio</h4>
            </div>
            <div class="modal-body">
            
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('mun_nombre', 'Nombre del Municipio', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::text('mun_nombre', null, ['class' => 'form-control']) !!} 
                                </div>
                                <span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
                                    <strong id="error8"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal para registrar Nuevo Componente-->
<div class="modal fade" id="modalComponente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Registrar Nuevo Componente</h4>
            </div>
            <div class="modal-body">
            
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('com_nombre', 'Nombre del Componente', ['class' => 'col-md-12 col-xs-12']) !!}
                            <div class="col-md-12 col-xs-12">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-bars"></i>
                                    </div>
                                    {!! Form::text('com_nombre', null, ['class' => 'form-control']) !!} 
                                </div>
                                <span id="msg-error8" class="help-block" style="display:none; color:red" role="alert">
                                    <strong id="error8"></strong>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
