@extends('layouts.layout')

@section('titulo','Crear Sala')

@section('content')
<br><br>
<h1 class="text-center" id="text"><h1>Crear nueva sala</h1>
@if ($errors->any())

<div class="alert alert-danger">
    <div class="header">
        <strong>Ups...</strong>algo salio mal
    </div>
    <ul>
        @foreach ($errors-all() as $error)
                <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>

@endif
<br><br>
<form action="{{ route('salas.store') }}" method="POST">
    @method('post')
    @csrf
    <br>
    <div>
        <label for="nombre" class="form-label texto my-2"><h4>Nombre de la sala</h4></label>
        <input type="text" name="nombre" id="nombre" value="{{ old('nombre')}}" class="form-control" >
    </div>
    <div>
        <label for="descripcion" class="form-label texto my-2"><h4>Descripcion de la sala</h4></label>
        <input type="text " name="descripcion" id="descripcion" value="{{ old('descripcion') }}" class="form-control">


    </div>
    <br>
    <div>
        <button type="submit" class="btn btn-info my-2"id="lg">Guardar</button>
    </div>

</form>
@endsection
