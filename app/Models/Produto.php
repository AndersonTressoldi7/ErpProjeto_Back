<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Produto extends Authenticatable
{
    protected $fillable = [
        'codigoBarras',
        'nome',
        'observacao',
        'categoria',
        'marca',
        'sku',
        'preco',
        'quantidade',
        'unidadeMedida',
        'peso',
        'dimensoes',
        'dataEntradaEstoque',
        'status',
        'referencia',
    ];

   
}
