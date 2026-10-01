<?php

use App\Http\Controllers\VitrineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;
use App\Models\Configuracao;
use App\Http\Controllers\ConfiguracaoController;


// 1. ROTAS PÚBLICAS
// ==========================================
Route::get('/', [VitrineController::class, 'index'])->name('home');
Route::get('/veiculo/{id}', [App\Http\Controllers\VitrineController::class, 'show'])->name('vitrine.show');
Route::get('/veiculos', [\App\Http\Controllers\VitrineController::class, 'veiculos'])->name('veiculos');

Route::view('/financiamento', 'financiamento')->name('financiamento');
Route::view('/contato', 'contato')->name('contato');
Route::view('/sobre-nos', 'sobre')->name('sobre');

// 2. ROTAS PRIVADAS
// ==========================================
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $total = \App\Models\Carro::count();
        $disponiveis = \App\Models\Carro::where('status', 'disponível')->count();
        $vendidos = \App\Models\Carro::where('status', 'vendido')->count();
        $inativos = \App\Models\Carro::where('status', 'inativo')->count();
        $ultimosCarros = \App\Models\Carro::with('imagens')->latest()->take(5)->get();
        

        return view('dashboard', compact('total', 'disponiveis', 'vendidos', 'inativos', 'ultimosCarros'));
    })->name('dashboard');

    Route::resource('carros', CarroController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/banners', [ConfiguracaoController::class, 'index'])->name('banners.index');
    Route::post('/configuracoes/banner', [ConfiguracaoController::class, 'updateBanner'])->name('configuracoes.banner');
    Route::post('/configuracoes/depoimentos', [\App\Http\Controllers\ConfiguracaoController::class, 'storeDepoimento'])->name('depoimentos.store');
    Route::delete('/configuracoes/depoimentos/{id}/foto/{index}', [\App\Http\Controllers\ConfiguracaoController::class, 'apagarFoto'])->name('depoimentos.foto.destroy');
    Route::get('/funcionarios/novo', [App\Http\Controllers\FuncionarioController::class, 'create'])->name('funcionarios.create');
    Route::post('/funcionarios/novo', [App\Http\Controllers\FuncionarioController::class, 'store'])->name('funcionarios.store');
});

require __DIR__.'/auth.php';