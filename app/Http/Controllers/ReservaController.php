<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reservas = Reserva::join('users', 'reservas.user_id', '=', 'users.id')
            ->join('salas', 'reservas.sala_id', '=', 'salas.id')
            ->join('sillas', 'reservas.silla_id', '=', 'sillas.id')
            ->select('sillas.descripcion as descripcionSilla', 'salas.*', 'users.*', 'reservas.*')->get();
        return view('reservas.index', compact('reservas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas = Sala::orderBy('nombre', 'asc')->get();
        $sillas = DB::select('SELECT DISTINCT * FROM sillas WHERE disponibilidad = "Si"');

        return view('reservas.insert', compact('salas', 'sillas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReservaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idUser = Auth::id();
        $user = Auth::user();

        $request->validate(
            [
                'sala_id' => 'required',
                'silla_id' => 'required'
            ]
        );
        $sala = Sala::all()->where('id', '=', $request->sala_id)->first();

        if ($user->edad < 18 && $sala->nombre === "Sala A")
         {
            $reserva = Reserva::create($request->all());
            $id = $reserva->id;
            DB::table('reservas')->where('id', $id)->update(['user_id' => $idUser]);
            DB::table('sillas')->where('id', $request->silla_id)->update(['disponibilidad' => 'No']);
            return redirect()->route('reservas.index')->with('exito', 'se ha registrado la reserva');

        } else if ($user->edad >= 18 && $sala->nombre === "Sala B" && $user->fumador === "Si")
         {
            $reserva = Reserva::create($request->all());
            $id = $reserva->id;
            DB::table('reservas')->where('id', $id)->update(['user_id' => $idUser]);
            DB::table('sillas')->where('id', $request->silla_id)->update(['disponibilidad' => 'No']);
            return redirect()->route('reservas.index')->with('exito', 'se ha registrado la reserva');

        }else if ($user->edad >= 18 && $sala->nombre === "Sala C" && $user->fumador === "No")
        {
            $reserva = Reserva::create($request->all());
            $id = $reserva->id;
            DB::table('reservas')->where('id', $id)->update(['user_id' => $idUser]);
            DB::table('sillas')->where('id', $request->silla_id)->update(['disponibilidad' => 'No']);
            return redirect()->route('reservas.index')->with('exito', 'se ha registrado la reserva');
        }else
         {
            return redirect()->route('reservas.index')->with('exito', ' No se ha registrado la reserva');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        $reservacion = Reserva::join('users', 'reservas.user_id', '=', 'users.id')
            ->join('salas', 'reservas.sala_id', '=', 'salas.id')
            ->join('sillas', 'reservas.silla_id', '=', 'sillas.id')
            ->select('sillas.descripcion as descripcionSilla', 'salas.*', 'users.*', 'reservas.*')
            ->where('reservas.id', '=', $id)
            ->first();
        $edades = Reserva::join('users', 'reservas.user_id', '=', 'users.id')
            ->select('users.*', 'reservas.*')
            ->get();
        $cantidadReservas = DB::table('reservas')
            ->select()->count('*');
        $total = 0;
        $promedio = 0;
        $contadorHombres = 0;
        $contadorMujeres = 0;
        $contadorFumadores = 0;
        $mensaje = "";
        $contadorMayor = 0;
        $contadorMenor = 0;
        foreach ($edades as $edad) {
            $total = (($edad->edad) + $total);
            if ($edad->genero == "Masculino") {
                $contadorHombres++;
            } else {
                $contadorMujeres++;
            }

            if ($edad->fumador == "Si") {
                $contadorFumadores++;
            }

            if ($edad->edad >= 18) {
                $contadorMayor++;
            } else {
                $contadorMenor++;
            }
        }
        if ($contadorMayor > $contadorMenor) {
            $mensaje = "Mayores de edad";
        } else if ($contadorMenor > $contadorMayor) {
            $mensaje = "Menores de edad";
        } else {
            $mensaje = "Igualdad";
        }
        $promedio = $total / $cantidadReservas;


        return view('reservas.view', compact('reservacion', 'cantidadReservas', 'user', 'promedio', 'contadorMujeres', 'contadorHombres', 'contadorFumadores', 'mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::FindOrFail($id);
        $salas = Sala::orderBy('nombre', 'asc')->get();
        $sillas = DB::select('SELECT DISTINCT * FROM sillas WHERE disponibilidad = "Si"');
        return view('reservas.edit',compact('reserva','salas','sillas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReservaRequest  $request
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $request->validate(
            [
                'sala_id' => 'required',
                'silla_id' => 'required'
            ]
        );
        $reserva = Reserva::FindOrFail($id);
        $reserva->update($request->all());

        return redirect()->route('reservas.index')->with('exito', '  se ha modificado la reserva');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserva  $reserva
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::FindOrFail($id);
        DB::table('sillas')->where('id',$reserva->silla_id)->update(['disponibilidad'=>'Si']);
        $reserva->delete();
        return redirect()->route('reservas.index')->with('exito', '  se ha modificado la reserva');
    }
}
