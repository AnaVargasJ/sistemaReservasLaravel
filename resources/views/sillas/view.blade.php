@extends('layouts.layout')

@section('titulo', 'silla')
@section('content')

    <h1 class="text-center pt-5 pb-3" id="text">Detalles </h1>
    <div class="row">
        <div class="col-sm-3">
            <h3  style="text-align: center; ">Detalles de la silla:</h3>


    <table class="table" style="text-align: center; ">
        <thead class="table-light"  >
          <tr>
              <th>{{ $silla->descripcionSilla }}</th>
          </tr>
<br>
        </thead>

      </table>
      <br>
      <a href="{{ route('sillas.index') }}" class="btn btn-info">Volver</a>
@endsection:</h3>
