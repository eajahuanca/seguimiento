@extends('layouts.init')

@section('FormularioTitulo','Solicitud del Primer Desembolso')
@section('FormularioDescripcion','en sección se carga la información sobre la solicitud del primer desembolso')
@section('FormularioActual','Desembolso')
@section('FormularioDetalle','Primer Desembolso')

@section('stylesheet')
@endsection

@section('ContenidoPagina')

    <div class="row">
        <div class="col-md-5 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>PROYECTO</b></span>
                    <span>{{ $solicitud->sol_nombre }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa "><b>Bs</b></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>IMPORTES</b></span>
                    <span>Fonabosque <b>{{ ' Bs. '.number_format($solicitud->sol_montofona,2,',','.') }}</b></span><br>
                    <span>Contraparte<b>{{ ' Bs. '.number_format($solicitud->sol_montosol,2,',','.') }}</b></span><br>
                    <span>Otro Importe <b>{{ ' Bs. '.number_format($solicitud->sol_montootro,2,',','.') }}</b></span>                  
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-clock-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><b>TIEMPO</b></span>
                    <span><b>{{ $solicitud->sol_tiempo.' Meses' }}</b></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos de la Solicitud</h3>
                </div>
                <div class="box-body">
                    @include('admin.desembolso1.form')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){

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
