@extends('layouts.init')

@section('FormularioTitulo','Carga de Archivo')
@section('FormularioDescripcion','Cargar archivo de respaldo correspondiente');
@section('FormularioActual','Carga de Archivo')
@section('FormularioDetalle','Cargar archivo')

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')

    {!! Form::open(['route' => 'convenio.store', 'method' => 'POST', 'class' => 'form-horizontal', 'files' => true]) !!}
        @include('admin.seguimiento.form')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar el archivo"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar la carga del archivo"><a href="{{ route('convenio.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
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
    </script>
@endsection