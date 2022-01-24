<?php

namespace App\Http\Controllers;

use App\Models\Silla;
use App\Models\Sala;
use Illuminate\Http\Request;

class SillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        //listar los desarrolladores ordenados por nombre ascendentemente
        $sillas = Silla::join('salas', 'sillas.salasId', '=', 'salas.id')
            ->select('sillas.descripcion as descripcionSilla','sillas.id', 'salas.nombre')
            ->orderBy('salas.nombre','asc')->get();
        //Enviar a la vista
        return view('sillas.index', compact('sillas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //listar proyectos
        $salas = Sala::orderBy('nombre','asc')->get();
        //Enviar a la vista
        return view('sillas.insert', compact('salas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, )
    {
        //
        $request->validate([

            'descripcion'=> 'required',
            'salasId'=> 'required',

        ]);

        Silla::create($request->all());

        return redirect()->route('sillas.index')->with('exito','Se ha agregado el Silla exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Silla  $Silla
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $silla  = Silla::join('salas', 'sillas.salasId','=','salas.id')
                                        ->select('sillas.descripcion as descripcionSilla','salas.*')
                                        ->where('sillas.id','=',$id)
                                        ->first();

        return view('sillas.view', compact('silla'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Silla $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $salas = Sala::orderBy('nombre','asc')->get();
        $silla = Silla::FindOrFail($id);
        return view('sillas.edit', compact('salas','silla'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Silla  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'descripcion'=> 'required',
            'salasId'=> 'required',


        ]);

        $silla = Silla::findOrFail($id);
        $silla->update($request->all());




        return redirect()->route('sillas.index')->with('exito','Se ha modificado los datos del producto exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Silla  $desarrollador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $silla = Silla::findOrFail($id);
        $silla->delete();

        return redirect()->route('sillas.index')->with('exito','Se ha eliminado la silla correctamente.');
    }
}
