<?php

namespace App\Models;

use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'estado_id'
    ];

    
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
