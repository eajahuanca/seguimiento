<div style="widht:100%; height:100%">
<?php
    Mapper::map(    
            //traer coordenas del objetivo especifico
            -16.5191841,
            -68.1685108,
            [
                'zoom' => 16,
                'overlay' => 'TRAFFIC',
                //tipos de animation:NONE, DROP, BOUNCE
                //'markers' => ['title' => 'My Location','content' => 'Mi accion', 'animation' => 'BOUNCE'],
                'markers' => ['animation' => 'BOUNCE'],
                'draggable' => false, //para activar o desactivar para que se mueva el marcador
                'marker' => true        //para posicionar el marcador segun coordenadas
            ]
        );
?>
{!! Mapper::render() !!}
</div>