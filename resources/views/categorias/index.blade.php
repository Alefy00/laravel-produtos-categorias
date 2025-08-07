@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-xl font-semibold">Lista de Categorias</h1>
        <a href="{{ route('categorias.create') }}"
           class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-300">
            Nova Categoria
        </a>
    </div>

    <div class="overflow-x-auto rounded-lg border border-slate-200 bg-white shadow-sm">
        <table class="w-full border-collapse text-sm">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">ID</th>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">Nome</th>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">Ordem</th>
                    <th class="px-4 py-2 text-left font-medium text-slate-600">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categorias as $categoria)
                    <tr class="border-t border-slate-200">
                        <td class="px-4 py-2">{{ $categoria->id }}</td>
                        <td class="px-4 py-2">{{ $categoria->name }}</td>
                        <td class="px-4 py-2">{{ $categoria->order }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('categorias.edit', $categoria) }}"
                               class="text-slate-600 hover:text-slate-900">Editar</a>
                            <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja excluir esta categoria?')"
                                        class="text-red-600 hover:text-red-800">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="border-t border-slate-200">
                        <td colspan="4" class="px-4 py-3 text-center text-slate-500">
                            Nenhuma categoria encontrada.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
