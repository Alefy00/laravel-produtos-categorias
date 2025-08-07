<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        // traz com a categoria pra evitar N+1
        $produtos = Produto::with('categoria')->orderByDesc('created_at')->get();

        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('name')->get();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'between:0,9999999.99'],
            'category_id' => ['required', 'exists:categorias,id'],
        ]);

        Produto::create($validated);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::orderBy('name')->get();
        return view('produtos.edit', compact('produto','categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'price'       => ['required', 'numeric', 'between:0,9999999.99'],
            'category_id' => ['required', 'exists:categorias,id'],
        ]);

        $produto->update($validated);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
