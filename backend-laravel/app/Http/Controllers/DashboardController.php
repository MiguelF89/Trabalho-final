<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instituicao;

class DashboardController extends Controller
{
    public function index()
    {
        $instituicoes = Instituicao::all();
        return view('dashboard', compact('instituicoes'));
    }
}