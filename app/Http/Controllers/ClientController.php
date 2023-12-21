<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientController extends Controller
{
    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'naturalidade' => 'required|string|max:255',
            'estado_civil' => 'required|string|max:255',
            'profissao' => 'required|string|max:255',
            'nome_mae' => 'required|string|max:255',
            'nome_pai' => 'required|string|max:255',
            'rg' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:clientes,cpf',
            'nascimento' => 'required|date',
            'cidade_nascimento' => 'required|string|max:255',
            'endereco' => 'required|array',
            'endereco.rua' => 'required|string|max:255',
            'endereco.numero' => 'required|string|max:255',
            'endereco.bairro' => 'required|string|max:255',
            'endereco.municipio' => 'required|string|max:255',
            'endereco.estado' => 'required|string|max:255',
            'endereco.cep' => 'required|string|max:10',
            'documentos' => 'required|array',
            'documentos.*.nome' => 'required|string|max:255',
            'documentos.*.tipo_documento' => 'required|string|max:255',
            'documentos.*.descricao' => 'required|string|max:255',
            'documentos.*.link' => 'required|string|max:255',
            'documentos.*.size' => 'required|integer',
        ]);
        Cliente::create($validatedData);
    }
}
