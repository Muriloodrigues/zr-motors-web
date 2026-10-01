<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\Configuracao;
use Illuminate\Http\Request;

class VitrineController extends Controller
{
    public function index()
    {
        $carros = \App\Models\Carro::with('imagens')
            ->where('status', 'Disponível')
            ->where('destaque', true)
            ->latest()
            ->take(6)
            ->get();
        
        $configuracoes = \App\Models\Configuracao::first();
        $depoimentos = \App\Models\Depoimento::latest()->get();
        
        return view('welcome', compact('carros', 'configuracoes', 'depoimentos'));
    }
    
    public function show($id)
    {
        $carro = Carro::with('imagens')->findOrFail($id);
        
        return view('veiculo', compact('carro'));
    }

    public function veiculos()
    {

        $carros = \App\Models\Carro::with('imagens')
                    ->where('status', 'Disponível') 
                    ->latest()
                    ->paginate(12);

        return view('veiculos', compact('carros'));
    }
}