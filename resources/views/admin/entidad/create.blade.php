@extends('layouts.init')

@section('FormularioTitulo','Entidades')
@section('FormularioDescripcion','registrar nueva entidad')
@section('FormularioActual','Entidad')
@section('FormularioDetalle','Registrar nueva Entidad')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('plugins/lte/iCheck/all.css') }}">
	<link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
    <link href="{{ asset('plugins/lte/datatables/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')

    {!! Form::open(['route' => 'entidad.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        @include('admin.entidad.form')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><a href="{{ route('entidad.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
            </center>
        </div>
    {!! Form::close() !!}
@endsection

@section('javascript')
	<script src="{{ asset('plugins/lte/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif
        });
    </script>
    <script src="{{ asset('plugins/lte/datatables/responsive/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable({
                "bPaginate": false,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": true,
                dom: 'Bfrtip'
            });
        });
    </script>
    <!--Modal para Buscar Entidad-->
    <div class="modal fade" id="modalEntidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Busqueda de datos de la Entidad</h4>
                </div>
                <div class="modal-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr class="btn-success">
                                <th style="text-align: center !important;">Op</th>
                                <th style="text-align: center !important;">Entidad</th>
                                <th style="text-align: center !important;">Sigla</th>
                                <th style="text-align: center !important;">Unidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($soloEntidad as $itemEntidad)
                            <tr id="{{ $itemEntidad->id }}">
                                <td align="center">
                                    <div class="form-horizontal">
                                        <input type="radio" name="radioEntidad" class="flat-red"/>
                                    </div>
                                </td>
                                <td>{{ $itemEntidad->param_entidad }}</td>
                                <td>{{ $itemEntidad->param_sigla }}</td>
                                <td>{{ $itemEntidad->param_unidad }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success">Aceptar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal para Buscar Unidad-->
    <div class="modal fade" id="modalUnidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Busqueda de datos de la Unidad</h4>
                </div>
                <div class="modal-body">
                cuerpo
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Seleccionar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('plugins/lte/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            });
        });
    </script>
@endsection
