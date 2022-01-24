@extends('layouts.layout')

@section('titulo','editar silla')


@section('content')
<h1 class="text-center my-5" id="text">Editar Silla</h1>
@if($errors->any())

    <div class="alert alert-danger">
        <div class="header">
            <strong>Upss...</strong>algo salio mal
        </div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('sillas.update',$silla->id) }}" method="post">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="descripcion" class="form-label texto my-2">
                <h4>Descripcion</h4>
            </label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $silla->descripcion }}">

        </div>

        <div class="mb-3">
            <label for="salasId" class="form-label texto my-2">
                <h4>Sala</h4>
            </label>
            <select name="salasId" id="salasId"  class="form-select">
                @foreach ($salas as $sala)
                    <option value="{{ $sala->id }}"@if ($silla->salasId == $sala->id)
                        selected
                    @endif>
                    {{ $sala->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-info my-2" id="lg">Guardar</button>
        </div>
    </form>
@endsection
