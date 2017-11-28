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
        return view('admin.objetivo.mapa');
    }
}