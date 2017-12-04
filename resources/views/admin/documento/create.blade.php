@extends('layouts.init')

@section('FormularioTitulo','Documentación previa')
@section('FormularioDescripcion','en sección se carga la documentación PREVIA AL PRIMER DESEMBOLSO')
@section('FormularioActual','Documentos')
@section('FormularioDetalle','Cargar Documentos')

@section('stylesheet')
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
                    <h3 class="box-title">Cargar Documento correspondiente al ítem seleccionado</h3>
                </div>
                <div class="box-body">
                    @include('admin.documento.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif
        });
    </script>
@endsection
