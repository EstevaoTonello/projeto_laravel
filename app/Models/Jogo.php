<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jogo extends Model
{
    protected $table = 'jogos';

    protected $fillable = [
        'titulo', 'descricao', 'preco', 'data_lancamento',
        'categoria_id', 'desenvolvedora_id', 'plataforma_id',
    ];

    protected $casts = [
        'data_lancamento' => 'date',
        'preco' => 'decimal:2',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    public function desenvolvedora(): BelongsTo
    {
        return $this->belongsTo(Desenvolvedora::class);
    }

    public function plataforma(): BelongsTo
    {
        return $this->belongsTo(Plataforma::class);
    }
}
