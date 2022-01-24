<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $salas = Sala::orderBy('nombre', 'asc')->simplePaginate(5);

        return view('salas.index', compact('salas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Enviar a la vista
        return view('salas.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        $request->validate([
            'nombre'=> 'required',
            'descripcion'=> 'required',

        ]);

        Sala::create($request->all());
        //Retornar la vista
        return redirect()->route('salas.index')->with('exito','Se ha guardado la Sala exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sala  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $sala = Sala::FindOrFail($id);
        //Enviar a la vista
        return view('salas.view', compact('sala'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sala  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sala = Sala::FindOrFail($id);
        //Enviar a la vista
        return view('salas.edit', compact('sala'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sala  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nombre'=> 'required',
            'descripcion'=> 'required',
        ]);

        $sala = Sala::FindOrFail($id);

        $sala->update($request->all());
        //Retornar la vista
        return redirect()->route('salas.index')->with('exito','Se ha modificado la sala exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sala  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sala = Sala::FindOrFail($id);
        $sala->delete();
        return redirect()->route('salas.index')->with('exito','Se ha eliminado la sala correctamente.');
    }
}
