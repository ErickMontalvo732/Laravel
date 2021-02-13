<?php

namespace App\Http\Controllers;

use App\Models\Target;  //AGREGAMOS LA TABLA/MODELO
use Illuminate\Http\Request;
use App\Http\Requests\TargetRequest;

class TargetController extends Controller
{
    public function index()
    {
        $targets = Target::orderBy('ranking', 'desc')
            ->paginate(5);
        //  ->get();
        return view('index', compact('targets'));
    }

    public function edit()
    {
        $targets = Target::orderBy('ranking', 'desc')
            ->paginate(5);
        //  ->get();
        return view('edit', compact('targets'));
    }

    public function create()
    {
        $targets = Target::orderBy('ranking', 'desc')
            ->paginate(5);
        //  ->get();
        return view('create', compact('targets'));
    }


    public function store(TargetRequest $request)
    {
        // 1 VALIDAR DATOS
        //  SE VALIDAN EN EL METODO POST EN EL FORMULARIO CUANDO MANDA A LLAMAR A
        //  TARGET REQUEST

        // 2 INSERTAR DATOS A TARGET
            Target::create([
                'name' => $request->name,
                'ranking' => $request->ranking

            ]);
        // 3 REDIRECT
               return redirect('/create');

        //DISPLAY AND DONE
        //dd($request->all());
        // MUESTRA EN PANTALLA LOS DATOS DEL FORM
        // dd($request->ranking());
        // return view('create');
    }
}
