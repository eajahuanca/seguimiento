@extends('layouts.init')

@section('FormularioTitulo','Programación')
@section('FormularioDescripcion','en sección se visualizan el formulario de registro de programación')
@section('FormularioActual','Programación')
@section('FormularioDetalle','Formulario de registro de programación')

@section('stylesheet')
    <link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Programación, Formulario # 4</h3>
                    <p>{!! $actividad->act_nombre !!}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Registro de Programación de Actividades</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <!--Cuerpo de progrmacion-->
                @include('ejecutor.programacion.formulario.formcuatro.formRegistro')
                <!--Fin Cuerpo de progrmacion-->
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
    <script type="text/javascript">
        $(document).ready(function() {
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