<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'uf'
    ];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
