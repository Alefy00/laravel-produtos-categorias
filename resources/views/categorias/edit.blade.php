@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
    <h1>Editar Categoria</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('categorias.update', $categoria) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nome:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $categoria->name) }}" required>
        </div>

        <br>

        <button type="submit">Atualizar</button>
        <a href="{{ route('categorias.index') }}">Cancelar</a>
    </form>
@endsection
