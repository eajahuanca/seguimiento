@extends('layouts.init')

@section('FormularioTitulo','Carga de Archivo')
@section('FormularioDescripcion','Cargar archivo de respaldo correspondiente');
@section('FormularioActual','Carga de Archivo')
@section('FormularioDetalle','Cargar archivo')

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')

    {!! Form::open(['route' => 'evaluacion.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('admin.evaluacion.form')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar el archivo"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar la carga del archivo"><a class="btn btn-danger" id="btnRegresar"><i class="fa fa-reply-all"></i> Cancelar</a></span>
            </center>
        </div>
    {!! Form::close() !!}
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function(){
            @if(count($errors)>0)
                toastr["error"]("Validación de Campos", "Verifique los campos.");
            @endif
        });
        $('#btnRegresar').click(function(){
            history.back();
        });
    </script>
@endsection