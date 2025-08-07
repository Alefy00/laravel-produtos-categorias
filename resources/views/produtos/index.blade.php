@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <h1>Lista de Produtos</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('produtos.create') }}">Novo Produto</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:10px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->name }}</td>
                    <td>R$ {{ number_format((float)$produto->price, 2, ',', '.') }}</td>
                    <td>{{ $produto->categoria?->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto) }}">Editar</a>

                        <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Excluir este produto?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum produto encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
