<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pessoa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'cpfCnpj',
        'sexo',
        'cliente',
        'funcionario',
        'fornecedor',
        'cidade_id',
        'bairro',
        'rua',
        'dataNascimento',
    ];

    protected $appends = [
        'cidade_nome',
    ];


    public function getSexoAttribute($value)
    {
        return $value == 1 ? 'Feminino' : 'Masculino';
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function getCidadeNomeAttribute()
    {
        return  $this->cidade->nome;
    }

 
}
