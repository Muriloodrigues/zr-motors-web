<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Models\ImagemCarro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarroController extends Controller
{
    
    public function index()
    {
        $carros = Carro::latest()->get();
        return view('carros.index', compact('carros'));
    }

        public function create()
    {
        return view('carros.create');
    }

    
    public function store(Request $request)
    {
        
        if ($request->has('preco')) {
            $preco = $request->preco;
            
            
            if (str_contains($preco, ',')) {
                $preco = str_replace('.', '', $preco);
                $preco = str_replace(',', '.', $preco);
            }
            
            $request->merge(['preco' => $preco]);
        }

        
        $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'ano_fabricacao' => 'required|integer',
            'ano_modelo' => 'required|integer',
            'preco' => 'required|numeric',
            'quilometragem' => 'required|integer',
            'imagens.*' => 'image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $dadosCarro = $request->except(['imagens', '_token']);
        $dadosCarro['status'] = 'Disponível'; 
        $dadosCarro['destaque'] = $request->has('destaque'); 
        $carro = Carro::create($dadosCarro);

        if ($request->has('ordem_fotos')) {
            ImagemCarro::where('carro_id', $carro->id)->update(['is_capa' => false]);

            foreach ($request->ordem_fotos as $fotoId => $ordem) {
                $isCapa = ($ordem == 1) ? true : false;

                ImagemCarro::where('id', $fotoId)->update([
                    'ordem' => $ordem,
                    'is_capa' => $isCapa
                ]);
            }
        }

        return redirect()->route('carros.index')->with('success', 'Veículo adicionado com sucesso!');
    }

    public function show(string $id) {}

    public function edit(string $id)
    {
        $carro = Carro::findOrFail($id);
        return view('carros.edit', compact('carro'));
    }

    public function update(Request $request, string $id)
    {
        if ($request->has('preco')) {
            $preco = $request->preco;
            
            if (str_contains($preco, ',')) {
                $preco = str_replace('.', '', $preco);
                $preco = str_replace(',', '.', $preco);
            }
            
            $request->merge(['preco' => $preco]);
        }

        $carro = Carro::findOrFail($id);
        $dadosCarro = $request->except(['imagens', 'imagens_remover', 'ordem_fotos', '_token', '_method']);
        $dadosCarro['destaque'] = $request->has('destaque');
        $carro->update($dadosCarro);

        if ($request->filled('imagens_remover')) {
            $idsParaRemover = explode(',', $request->imagens_remover);
            $fotosRemover = ImagemCarro::whereIn('id', $idsParaRemover)->where('carro_id', $carro->id)->get();

            foreach ($fotosRemover as $foto) {
                if (\Illuminate\Support\Facades\Storage::disk('public')->exists($foto->caminho_imagem)) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($foto->caminho_imagem);
                }
                $foto->delete();
            }
        }

        if ($request->has('ordem_fotos')) {
            ImagemCarro::where('carro_id', $carro->id)->update(['is_capa' => false]);
            
            foreach ($request->ordem_fotos as $fotoId => $ordem) {
                ImagemCarro::where('id', $fotoId)->update([
                    'ordem' => $ordem,
                    'is_capa' => ($ordem == 1 ? true : false) 
                ]);
            }
        }

        if ($request->hasFile('imagens')) {
            $ultimaOrdem = ImagemCarro::where('carro_id', $carro->id)->max('ordem') ?? 0;

            foreach ($request->file('imagens') as $imagem) {
                $caminho = $imagem->store('carros', 'public');
                $ultimaOrdem++;

                ImagemCarro::create([
                    'carro_id' => $carro->id,
                    'caminho_imagem' => $caminho,
                    'ordem' => $ultimaOrdem,
                    'is_capa' => false 
                ]);
            }
        }

        return redirect()->route('carros.index')->with('success', 'Veículo e fotos atualizados com sucesso!');
    }

    public function destroy(string $id)
    {
        $carro = Carro::findOrFail($id);

        foreach ($carro->imagens as $imagem) {
            if (Storage::disk('public')->exists($imagem->caminho_imagem)) {
                Storage::disk('public')->delete($imagem->caminho_imagem);
            }
        }

        $carro->delete();

        return redirect()->route('carros.index')->with('success', 'Veículo e fotografias removidos com sucesso!');
    }
}
