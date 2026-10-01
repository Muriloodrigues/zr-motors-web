<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'marca', 'modelo', 'categoria', 'tipo_veiculo', 
        'ano_fabricacao', 'ano_modelo', 'preco', 'quilometragem', 
        'final_placa', 'potencia_motor', 'combustivel', 'cambio', 
        'tipo_direcao', 'cor', 'portas', 'kit_gnv', 
        'descricao', 'opcionais', 'status', 
        'destaque'
    ];

    protected $casts = [
        'opcionais' => 'array', 
    ];

    public function imagens()
    {
        return $this->hasMany(ImagemCarro::class);
    }
}