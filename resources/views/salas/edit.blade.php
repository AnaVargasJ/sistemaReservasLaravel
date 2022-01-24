@extends('layouts.layout')

@section('titulo', 'Editar sala')

@section('content')
    <h1 class="text-center my-5" id="text">Editar Sala</h1>
    @if ($errors->any())

        <div class="alert alert-danger">
            <div class="header">
                <strong>Ups...</strong>algo salio mal
            </div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    @endif
    <form action="{{ route('salas.update', $sala->id) }}" method="post">
        @method('put')
        @csrf




        <div>
            <label for="nombre" class="form-label texto my-2"><h4>Nombre de  la sala</h4></label>
            <input type="text" name="nombre" id="nombre" value="{{ $sala->nombre }}" class="form-control">
        </div>
        <div>
            <label for="descripcion" class="form-label texto my-2"><h4>descripcion de  la sala</h4></label>
            <input type="text" name="descripcion" id="descripcion" value="{{ $sala->descripcion }}" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn btn-info my-2"> Guardar </button>
        </div>



    </form>
@endsection






