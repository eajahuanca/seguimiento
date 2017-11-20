@extends('layouts.init')

@section('FormularioTitulo','Coordenadas')
@section('FormularioDescripcion','registrar nueva coordenada')
@section('FormularioActual','Coordenadas')
@section('FormularioDetalle','Registrar nueva Coordenada')

@section('stylesheet')
@endsection

@section('ContenidoPagina')

    {!! Form::open(['route' => 'coordenada.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
        
        @include('admin.coordenada.form')
                
        <div class="form-group">
            <center>
                <span class="hint--top  hint--success" aria-label="Guardar los datos"><button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button></span>
                <span class="hint--top  hint--error" aria-label="Cancelar el registro"><button type="reset" class="btn btn-danger"><i class="fa fa-reply-all"></i> Cancelar</button></span>
            </center>
        </div>
    {!! Form::close() !!}
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
