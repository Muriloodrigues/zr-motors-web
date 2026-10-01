<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuracao;
use Illuminate\Support\Facades\Storage;

class ConfiguracaoController extends Controller
{
    public function updateBanner(Request $request)
    {
        $request->validate([
            'banner_novidades' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:5120'],
        ]);

        $configuracao = \App\Models\Configuracao::first();
        if (!$configuracao) {
            $configuracao = new \App\Models\Configuracao();
        }

        if ($request->hasFile('banner_novidades')) {
            $caminho = $request->file('banner_novidades')->store('banners', 'public');
            $configuracao->banner_novidades = $caminho;
            $configuracao->save();
        }

        return back()->with('status', 'Banner atualizado com sucesso!');
    }

    public function index()
    {
        $configuracao = \App\Models\Configuracao::first();
        $depoimentos = \App\Models\Depoimento::latest()->get();
        
        return view('banners.index', compact('configuracao', 'depoimentos'));
    }

    public function storeDepoimento(Request $request)
    {
        $request->validate([
            'fotos' => 'required|array',
            'fotos.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120'
        ]);

        $caminhos = [];
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $caminhos[] = $foto->store('depoimentos', 'public');
            }
        }

        \App\Models\Depoimento::create([
            'nome' => 'Entrega ZR Motors',
            'localizacao' => null,
            'texto' => 'Foto de entrega',
            'imagens' => $caminhos,
        ]);

        return back()->with('status', 'Fotos das entregas adicionadas com sucesso!');
    }
    public function apagarFoto($id, $index)
    {
        $depoimento = \App\Models\Depoimento::findOrFail($id);
        $imagens = $depoimento->imagens;

        if (isset($imagens[$index])) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($imagens[$index]);
            
            unset($imagens[$index]);
            
            $depoimento->imagens = array_values($imagens);
            $depoimento->save();

            if (count($depoimento->imagens) == 0) {
                $depoimento->delete();
            }
        }

        return back()->with('status', 'Foto apagada com sucesso!');
    }
}
