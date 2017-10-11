<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Entidad;
use Carbon\Carbon;

class EntidadController extends Controller
{
    public function __construct(){
        Carbon::setlocale('es');
    }
    public function index()
    {
        $entidad = Entidad::orderBy('created_at','DESC')->get();
        return view('admin.entidad.index')
            ->with('entidad', $entidad);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
}
