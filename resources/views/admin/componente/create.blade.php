@extends('layouts.init')

@section('FormularioTitulo','Componentes')
@section('FormularioDescripcion','registrar nuevo componente')
@section('FormularioActual','Componente')
@section('FormularioDetalle','Registrar nuevo componente')

@section('stylesheet')
	<link rel="stylesheet" href="{{ asset('plugins/lte/select2/select2.min.css') }}">
@endsection

@section('ContenidoPagina')

    {!! Form::open(['route' => 'componente.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        @include('admin.componente.form')

        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><a href="{{ route('componente.index') }}" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</a></span>
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
@endsection