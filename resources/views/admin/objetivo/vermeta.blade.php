<?php $cont = 1;?>
<table id="metasListar" class="table table-bordered">
    <tr class="btn-success">
        <th>#</th>
        <th>METAS</th>
        <th>ACTIVIDADES</th>
        <th>UNIDAD</th>
        <th>CANTIDAD</th>
    </tr>
    @foreach($rpta as $meta)
    <tr>
        <td>{{ $cont++ }}</td>
        <td>{!! $meta->met_nombre !!}</td>
        <td>{{  }}</td>
        <td>{{  }}</td>
    </tr>
    @endforeach
</table>