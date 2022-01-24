@extends('layouts.layout')

@section('titulo', 'Reservas')

@section('content')
<br><br>
    <h1 class="text-center pt-5 pb-3 " id="text"><h1>Reservas</h1>

    @if ($mensaje = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <p>{{ $mensaje }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- @if ($query)
    <div class="alert alert-success alert-dismissible fade show">
        <p>Los resultados de la busqueda <strong>{{ $query }} </strong> Son:</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}
    <br><br>
    <a href="{{ route('reservas.create') }}" class="btn btn-success mb-3 float-center"id="btn">Crear Reservas</a>
    <br>
    <table class="table table-hover" id="tablet">
        <thead>
            <tr>
                <th id="letter">Nombre Usuario</th>
                <th id="letter">Nombre Sala</th>
                <th id="letter">Descripcion de la Silla</th>
                <th id="letter">Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
            <tr>
                <td id="letter">{{ $reserva->name }}</td>
                <td id="letter">{{ $reserva->nombre }}</td>
                <td id="letter">{{ $reserva->descripcionSilla }}</td>

                <td id="letter">
                    <a href="{{ route('reservas.show', $reserva->id) }}" id="letter" class="btn btn-info">Detalles</a>
                    <a href="{{ route('reservas.edit', $reserva->id) }}" id="letter" class="btn btn-warning">Editar</a>
                    <form action="{{ route('reservas.destroy', $reserva->id) }}" method="post" class="d-inline-flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" id="letter"
                        onclick="return confirm('¿Confirma la eliminacion de la reserva  {{ $reserva->descripcion }}?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- @endif --}}
@endsection
