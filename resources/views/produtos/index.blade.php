@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold">Lista de Produtos</h1>
        <a href="{{ route('produtos.create') }}"
           class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-300">
            Novo Produto
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 p-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-slate-200 bg-white shadow-sm">
        <table class="w-full border-collapse text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">ID</th>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">Nome</th>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">Preço</th>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">Categoria</th>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">Vitrine?</th>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produtos as $produto)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-2">{{ $produto->id }}</td>
                        <td class="px-4 py-2">{{ $produto->name }}</td>
                        <td class="px-4 py-2">R$ {{ number_format((float)$produto->price, 2, ',', '.') }}</td>
                        <td class="px-4 py-2">{{ $produto->categoria?->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $produto->show_in_showcase ? 'Sim' : 'Não' }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('produtos.edit', $produto) }}"
                               class="text-slate-600 hover:text-slate-900">Editar</a>
                            <form action="{{ route('produtos.destroy', $produto) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Excluir este produto?')"
                                        class="text-red-600 hover:text-red-800">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="border-t border-slate-200">
                        <td colspan="6" class="px-4 py-3 text-center text-slate-500">
                            Nenhum produto encontrado.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
