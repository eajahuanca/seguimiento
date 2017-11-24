@include('admin.mesFecha')
<?php $cont = 1;?>
<table id="accionesListar" class="table table-bordered">
    <tr class="btn-success">
        <th>#</th>
        <th>ACCIONES</th>
        <th>DESDE</th>
        <th>HASTA</th>
    </tr>
    @foreach($rpta as $accion)
    <tr>
        <td>{{ $cont++ }}</td>
        <td>{!! $accion->acc_descripcion !!}</td>
        <td>{{ mesAnio($accion->acc_desde) }}</td>
        <td>{{ mesAnio($accion->acc_hasta) }}</td>
    </tr>
    @endforeach
</table>