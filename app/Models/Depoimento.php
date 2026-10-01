<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depoimento extends Model
{
    protected $fillable = ['nome', 'localizacao', 'texto', 'imagens'];
    
    protected $casts = [
        'imagens' => 'array',
    ];
}