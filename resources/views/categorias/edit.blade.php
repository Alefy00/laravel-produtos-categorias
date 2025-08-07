@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold">Editar Categoria</h1>
        <a href="{{ route('categorias.index') }}"
           class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300">
            Voltar
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-4 rounded-lg border border-red-200 bg-red-50 p-3 text-sm text-red-700">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('categorias.update', $categoria) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="space-y-1">
                <label for="name" class="text-sm font-medium">Nome</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $categoria->name) }}"
                    required
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200"
                />
            </div>

            <div class="space-y-1">
                <label for="order" class="text-sm font-medium">Ordem</label>
                <input
                    type="number"
                    id="order"
                    name="order"
                    value="{{ old('order', $categoria->order) }}"
                    min="0"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200"
                />
            </div>

            <div class="flex items-center gap-3">
                <button
                    type="submit"
                    class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-300"
                >
                    Atualizar
                </button>
                <a href="{{ route('categorias.index') }}"
                   class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
