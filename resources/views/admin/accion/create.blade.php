@extends('layouts.init')

@section('FormularioTitulo','Acciones')
@section('FormularioDescripcion','registrar nueva acción')
@section('FormularioActual','Acciones')
@section('FormularioDetalle','Registrar nueva Acción')

@section('stylesheet')
@endsection
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/lte/daterangepicker/daterangepicker.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('plugins/lte/datepicker/datepicker3.css') }}">
@section('ContenidoPagina')

    {!! Form::open(['route' => 'accion.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        
        @include('admin.accion.form')
                
        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
            </center>
        </div>
    {!! Form::close() !!}
@endsection

@section('javascript')
    <script src="{{ asset('plugins/editor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugins/editor/ckeditor/config.js') }}"></script>
    <script>
        $(function () {
            CKEDITOR.replace('acc_descripcion');
        });
    </script>
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

    <!-- date-range-picker -->
    <script src="{{ asset('plugins/lte/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/lte/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap datepicker -->
    <script src="{{ asset('plugins/lte/datepicker/bootstrap-datepicker.js"></script>
    <script>
        $(function () {
            $('#reservation').daterangepicker();
        });
    </script>
@endsection
