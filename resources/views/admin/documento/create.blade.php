@extends('layouts.init')

@section('FormularioTitulo','Documentación previa')
@section('FormularioDescripcion','en sección se carga la documentación PREVIA AL PRIMER DESEMBOLSO')
@section('FormularioActual','Documentos')
@section('FormularioDetalle','Cargar Documentos')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/lte/iCheck/all.css') }}">
@endsection

@section('ContenidoPagina')

    <div class="row">
        <div class="col-md-12 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>PROYECTO</b></span>
                    <span>{{ $solicitud->sol_nombre }}</span>
                </div>
            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Cargar Documento correspondiente al ítem seleccionado : {{ $tipo }}</h3>
                </div>
                <div class="box-body">
                    @include('admin.documento.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('plugins/lte/select2/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('.select2').select2();
        })
    </script>
    <script src="{{ asset('plugins/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/editor/ckeditor/config.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('doc_obs');
        })
    </script>
    <script src="{{ asset('plugins/lte/iCheck/icheck.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif

            $('input[type="checkbox"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });
    </script>
@endsection
