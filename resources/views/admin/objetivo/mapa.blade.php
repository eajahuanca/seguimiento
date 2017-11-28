<div style="widht:100%; height:100%">
@if($mostrar != 0)
    {!! Mapper::render() !!}
@else
    <center>
        <h2 style="font-family:arial;color:green;">Debe registrar las Coordenadas Correspondientes para ver el polígono</h2>
    </center>
@endif
</div>