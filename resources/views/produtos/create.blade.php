@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
    <h1>Novo Produto</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('produtos.store') }}">
        @csrf

        <div>
            <label for="name">Nome:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        </div>

        <div style="margin-top:8px;">
            <label for="price">Preço (use ponto como separador decimal, ex: 1999.90):</label><br>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price') }}" required>
        </div>
        <div style="margin-top:8px;">
            <label>
                <input type="checkbox" name="show_in_showcase" value="1"
                    @checked(old('show_in_showcase', isset($produto) ? $produto->show_in_showcase : false))>
                Mostrar na vitrine
            </label>
        </div>

        <div style="margin-top:8px;">
            <label for="category_id">Categoria:</label><br>
            <select name="category_id" id="category_id" required>
                <option value="">Selecione...</option>
                @foreach ($categorias as $cat)
                    <option value="{{ $cat->id }}" @selected(old('category_id') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <br>

        <button type="submit">Salvar</button>
        <a href="{{ route('produtos.index') }}">Cancelar</a>
    </form>
@endsection
