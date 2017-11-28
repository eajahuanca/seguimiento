<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Cornford\Googlmapper\Facades\MapperFacade;
use App\Coordenada;
use Mapper;

class MapaController extends Controller
{
    public function getMapa(Request $request, $id){
        $id = decrypt($id);
        $coordenada = Coordenada::where('idobjetivo','=',$id)->get();
        $poligono = array();
        $mostrar = 0;
        if(count($coordenada)>0){
            $mostrar = 1;
            foreach($coordenada as $item){
                $poligono[] = ['latitude' => $item->coor_x_map, 'longitude' => $item->coor_y_map];
            }
            Mapper::map(
                $poligono[0]['latitude'],$poligono[0]['longitude'],
                ['zoom' => 16, 'center' => true, 'marker' => true, 'overlay' => 'TRAFFIC', 'animation' => 'BOUNCE']
                )
                ->polygon($poligono, 
                [
                    'strokeColor' => '#047C36', 
                    'strokeOpacity' => 0.3, 
                    'strokeWeight' => 6, 
                    'fillColor' => '#09AF4F',
                ]);
        }
        return view('admin.objetivo.mapa')->with('mostrar', $mostrar);
    }
}