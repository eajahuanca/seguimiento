<?php $cont = 1;?>
@if(count($rpta)>0)
<table id="metasListar" class="table table-bordered">
    <tr class="btn-success">
        <th>#</th>
        <th>META</th>
        <th>ESTADO</th>
        <th>REGISTRO</th>
    </tr>
    
    @foreach($rpta as $meta)
    <tr>
        <td>{{ $cont++ }}</td>
        <td>{!! $meta->met_nombre !!}</td>
        <td>
        @if($meta->met_estado)
            <span class="hint--top  hint--warning" aria-label="Meta Habilitado"><button class="btn btn-warning btn-xs">Activo</button></span>
        @else
            <span class="hint--top  hint--error" aria-label="Meta Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
        @endif
        </td>
        <td>{{ $meta->created_at }}</td>
    </tr>
    @endforeach
</table>
@else
    <center><b>{{ 'AUN NO SE REGISTRARON SUS METAS'}}</b></center>
@endif