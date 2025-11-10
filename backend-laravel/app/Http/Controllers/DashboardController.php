<?php 

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Routing\Controller; 

class DashboardController extends Controller
{
    public function index()
    {
        $instituicoes = Instituicao::all();
        $produtos = Produto::all();
        $vendas = Venda::all();

        // CORREÇÃO: Incluir 'vendas' no compact()
        return view('dashboard', compact('instituicoes', 'produtos', 'vendas'));
    }
}
