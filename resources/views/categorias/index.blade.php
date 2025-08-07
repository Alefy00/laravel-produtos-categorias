@extends('layouts.app')

@section('content')
    <h1>Lista de Categorias</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('categorias.create') }}">Nova Categoria</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ordem</th>
                <th>Ações</th>
                
            </tr>
        </thead>
        <tbody>
            @forelse ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->name }}</td>
                    <td>{{ $categoria->order }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria) }}">Editar</a>

                        <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir esta categoria?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhuma categoria encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
