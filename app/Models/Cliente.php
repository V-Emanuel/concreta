<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'naturalidade',
        'estado_civil',
        'profissao',
        'nome_mae',
        'nome_pai',
        'rg',
        'cpf',
        'nascimento',
        'cidade_nascimento',
        'endereco',
        'documentos',
    ];

    protected $casts = [
        'endereco' => 'json',
        'documentos' => 'json',
    ];
}
