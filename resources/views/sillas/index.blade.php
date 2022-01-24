@extends('layouts.layout')

@section('titulo', 'Sillas')


@section('content')
<br><br>
<h1 class="text-center pt-5 pb-3" id="text"><h1>Sillas</h1>

    @if($mensaje = Session::get('exito'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $mensaje }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @endif
    <br><br>

    <a href="{{ route('sillas.create') }}" class="btn btn-success float-center" id="btn">Crear Silla</a>
    <br><br>
    <table class="table table-hover"  id="tablet">
        <thead>
            <tr>

                <th id="letter">descripcion</th>
                <th id="letter">sala</th>
                <th id="letter">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sillas as $silla)
            <tr id="letter">
                <td>{{ $silla->descripcionSilla }}</td>
                <td>{{ $silla->nombre }}</td>

                <td id="letter">
                    <a href="{{ route('sillas.show',$silla->id) }}" class="btn btn-info">Detalles</a>
                    <a href="{{ route('sillas.edit',$silla->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ route('sillas.destroy',$silla->id) }}" method="post" class="d-inline-flex">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Confirma la eliminacion del producto  {{ $silla->descripcionSilla }}?')">Eliminar</button>

                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
