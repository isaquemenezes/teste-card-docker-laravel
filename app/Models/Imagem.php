<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;

    protected $table = 'imagens';

    protected $fillable = [
        'produto_id',
        'caminho_imagem',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}

