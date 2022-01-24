@extends('layouts.layout')

@section('titulo','detalles de la sala')

@section('content')
<br><br>
<h1 class="text-center " id="text"><h1>Detalles de la sala</h1>
<br><br>







    <table class="table" style="text-align: center; ">
        <thead class="table-dark">
          <tr>
              <th>{{ $sala->nombre }}</th>
          </tr>
<br>
        </thead>
        <tr>
            <th>{{ $sala->descripcion }}</th>
        </tr>
      </table>
      <br>
      <a href="{{ route('salas.index') }}" class="btn btn-info">Volver</a>
@endsection:</h3>
