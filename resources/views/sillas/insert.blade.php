@extends('layouts.layout')

@section('titulo', 'Crear silla')
@section('content')
    <h1 class="text-center" id="text">Registrar nueva Silla</h1>
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
    <form class="well form-horizontal" action="{{ route('sillas.store') }}" method="post" id="insert_developer">
        @csrf
        @method('post')
        <div class="form-group">
            <label class="col-md-4 control-label">Descripcion</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="descripcion" placeholder="descripcion" class="form-control" type="text"
                        value="{{ old('descripcion') }}">
                </div>
            </div>
        </div>



        <div class="form-group">
            <label class="col-md-4 control-label">Sala</label>
            <div class="col-md-4 selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <select name="salasId" class="form-control selectpicker">
                        <option value="">Seleccione...</option>
                        @foreach ($salas as $sala)
                            <option value="{{ $sala->id }}" @if (old('salasId') == $sala->id)
                                selected
                        @endif>
                        {{ $sala->nombre }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-info my-2" id="lg"> Guardar </button>
        </div>
    </form>
@endsection
