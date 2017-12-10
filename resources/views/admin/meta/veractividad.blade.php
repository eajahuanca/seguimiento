<?php $cont = 1;?>
@if(count($rpta)>0)
<table id="metasListar" class="table table-bordered">
    <tr class="btn-success">
        <th>#</th>
        <th>Actividad</th>
        <th>Cantidad | Unidad</th>
        <th>Otro</th>
        <th>Observaciones</th>
        <th>Estado</th>
    </tr>
    
    @foreach($rpta as $actividad)
    <tr>
        <td>{{ $cont++ }}</td>
        <td>{!! $actividad->act_nombre !!}</td>
        <td>{!! $actividad->act_cantidad.' | '.$actividad->act_unidad !!}</td>
        <td>{!! $actividad->act_otro!!}</td>
        <td>{!! $actividad->act_obs !!}</td>
        <td>
        @if($actividad->act_estado)
            <span class="hint--top  hint--warning" aria-label="Actividad Habilitado"><button class="btn btn-warning btn-xs">Activo</button></span>
        @else
            <span class="hint--top  hint--error" aria-label="Actividad Bloqueado"><button class="btn btn-danger btn-xs">Bloqueado</button></span>
        @endif
        </td>
    </tr>
    @endforeach
</table>
@else
    <center><b>{{ 'AUN NO SE REGISTRARON SUS ACTIVIDADES' }}</b></center>
@endif