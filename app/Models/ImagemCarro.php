<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagemCarro extends Model
{
    protected $table = 'imagens_carros'; 

    protected $fillable = [
        'carro_id', 
        'caminho_imagem', 
        'is_capa',
        'ordem'
    ];

    public function carro()
    {
        return $this->belongsTo(Carro::class);
    }
}