@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold">Editar Produto</h1>
        <a href="{{ route('produtos.index') }}"
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
        <form method="POST" action="{{ route('produtos.update', $produto) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <div class="space-y-1">
                <label for="name" class="text-sm font-medium">Nome</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $produto->name) }}"
                    required
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200"
                />
            </div>

            <div class="space-y-1">
                <label for="price" class="text-sm font-medium">Preço</label>
                <input
                    type="number"
                    id="price"
                    name="price"
                    step="0.01"
                    value="{{ old('price', $produto->price) }}"
                    required
                    placeholder="Ex: 1999.90"
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200"
                />
            </div>

            <div class="flex items-center gap-2">
                <input
                    type="checkbox"
                    id="show_in_showcase"
                    name="show_in_showcase"
                    value="1"
                    @checked(old('show_in_showcase', isset($produto) ? $produto->show_in_showcase : false))
                    class="h-4 w-4 rounded border-slate-300 text-slate-900 focus:ring-slate-400"
                />
                <label for="show_in_showcase" class="text-sm">Mostrar na vitrine</label>
            </div>

            <div class="space-y-1">
                <label for="category_id" class="text-sm font-medium">Categoria</label>
                <select
                    id="category_id"
                    name="category_id"
                    required
                    class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none focus:border-slate-400 focus:ring-2 focus:ring-slate-200"
                >
                    <option value="">Selecione...</option>
                    @foreach ($categorias as $cat)
                        <option value="{{ $cat->id }}" @selected(old('category_id', $produto->category_id) == $cat->id)>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center gap-3">
                <button
                    type="submit"
                    class="rounded-lg bg-slate-900 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-300"
                >
                    Atualizar
                </button>
                <a href="{{ route('produtos.index') }}"
                   class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-300">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection
