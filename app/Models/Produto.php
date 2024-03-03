<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'descricao',
        'valor_venda',
        'estoque'
    ];


    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class);
    }

    
}
