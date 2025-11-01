<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    // Exibe todas as vendas
    public function index()
    {
        $vendas = Venda::all();
        return view('vendas.index', compact('vendas'));
    }

    // Mostra o formulário de criação
    public function create()
    {
        $produtos = Produto::all();
        return view('vendas.create', compact('produtos'));
    }

    // Salva a nova venda
    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);

        Venda::create($request->all());

        return redirect()->route('vendas.index')
                         ->with('success', 'Venda registrada com sucesso!');
    }

    // Mostra o formulário de edição
    public function edit(Venda $venda)
    {
        $produtos = Produto::all();
        return view('vendas.edit', compact('venda', 'produtos'));
    }

    // Atualiza a venda
    public function update(Request $request, Venda $venda)
    {
        $request->validate([
            'produto_id' => 'required|exists:produtos,id',
            'quantidade' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);

        $venda->update($request->all());

        return redirect()->route('vendas.index')
                         ->with('success', 'Venda atualizada com sucesso!');
    }

    // Remove a venda
    public function destroy(Venda $venda)
    {
        $venda->delete();

        return redirect()->route('vendas.index')
                         ->with('success', 'Venda removida com sucesso!');
    }
}
