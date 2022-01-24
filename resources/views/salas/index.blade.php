@extends('layouts.layout')

@section('titulo', 'Salas')
@section('content')
<br><br>
    <h1 class = "text-center pt-5 pb-3" id="text">Salas</h1>

    @if($mensaje = Session::get('exito'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- @if ($query) --}}
    {{-- <div class="alert alert-success alert-dismissible fade show">
        <p>Los resultadOs de la busqueda <strong>{{ $query }} </strong> Son:</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> --}}
    {{-- @endif --}}
    <br><br>
    <a href="{{ route('salas.create') }}" class="btn btn-lg btn-success mb-3 float-center" id="btn">Crear sala</a>
    <br>
    <table class="table table-hover"  id="tablet">
        <thead>
            <tr>
                <th id="letter">Nombre </th>
                <th id="letter">Descripcion </th>
                <th id="letter">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salas as $sala)
                <tr>
                    <td id="letter"> {{ $sala->nombre }} </td>
                    <td id="letter"> {{ $sala->descripcion }} </td>
                    <td id="letter">
                        <a href="{{ route('salas.show', $sala->id) }}" class="btn btn-info">Detalles</a>
                        <a href="{{ route('salas.edit', $sala->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('salas.destroy', $sala->id) }}" method="post" class="d-inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Confirma la eliminacion de la sala  {{ $sala->nombre }}?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
@endsection
