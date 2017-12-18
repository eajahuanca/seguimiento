@extends('layouts.init')

@section('FormularioTitulo','Seguimiento a Proyecto')
@section('FormularioDescripcion','en sección se carga la información sobre el proyecto a hacer seguimiento')
@section('FormularioActual','Seguimiento')
@section('FormularioDetalle','Seguimiento')

@section('stylesheet')
    <link href="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('ContenidoPagina')
    <?php $cont = 1; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Seguimiento al Proyecto</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <table id="example" class="table table-striped table-bordered tblSigec" cellspacing="0" width="100%">
                        <thead>
                            <tr class="btn-success">
                                <th style="text-align: center !important;">#</th>
                                <th style="text-align: center !important;">Componentes</th>
                                <th style="text-align: center !important;">Código</th>
                                <th style="text-align: center !important;">Proyecto</th>
                                <th style="text-align: center !important;">Entidad (UE)</th>
                                <th style="text-align: center !important;">Ciudad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitud as $item)
                            <tr>
                                <td class="text-center">{{ $cont++ }}</td>
                                <td class="text-center">
                                    <span class="hint--top  hint--warning" aria-label="Ver Componentes, Metas y Actividades"><a href="{{ route('ejecutor.show', encrypt($item->id)) }}" class="btn btn-warning"><i class="fa fa-sign-out"></i></a></span>
                                    <span class="hint--top  hint--error" aria-label="descargar Formulario 1ro."><a href="{{ url('/reportOne',$item->id) }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                                    <span class="hint--top  hint--error" aria-label="descargar Formulario 2do."><a href="{{ url('/reportTwo',$item->id) }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                                    <span class="hint--top  hint--error" aria-label="descargar Formulario 3ro."><a href="{{ url('/reportThree',$item->id) }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                                    <span class="hint--top  hint--error" aria-label="descargar Formulario 4to."><a href="{{ url('/reportFour',$item->id) }}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a></span>
                                </td>
                                <td>{{ $item->sol_codigo }}</td>
                                <td>{{ $item->sol_nombre }}</td>
                                <td>{{ $item->entidad->ent_nombre }}</td>
                                <td>{{ $item->departamento->dep_descripcion }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('plugins/lte/datatables/responsive/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/datatables/responsive/responsive.bootstrap4.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();

            @if(Session::get('estado')=="1")
                toastr["success"]("{{ Session::get('msg') }}","{{ Session::get('title') }}");
            @endif
            @if(Session::get('estado')=="2")
                toastr["error"]("{{ Session::get('msg') }}", "{{ Session::get('title') }}");
            @endif
            {{ Session::forget('estado') }}
            {{ Session::forget('title') }}
            {{ Session::forget('msg') }}
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif
        });
    </script>
@endsection
