<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientController extends Controller
{
    public function create(Request $request)
    {

        $data = $request->all();

        foreach ($data as $chave => $valor) {
            if ($chave === 'naturalidade') {
                if ($valor === 'outro' || $valor === '' || $valor === null) {
                    unset($data[$chave]);
                }
            }
        }

        $endereco = [
            'cep'=> $data['cep'] ?? 'joge',
            'rua'=> $data['rua'],
            'bairro'=> $data['bairro'] ?? 'joge',
            'numero'=> $data['numero'] ?? 'joge',
            'cidade'=> $data['cidade'] ?? 'joge',
            'estado'=> $data['estado'] ?? 'joge' ,
        ];

        $cliente = new Cliente([
            'nome' => $data['nome'],
            'celular' => $data['celular'],
            'naturalidade' => $data['naturalidade'] ?? 'joge',
            'estado_civil' => $data['estado_civil'],
            'profissao' => $data['profissao'],
            'nome_mae' => $data['nome_mae'],
            'nome_pai' => $data['nome_pai'],
            'rg' => $data['rg'],
            'cpf' => $data['cpf'],
            'nascimento' => $data['nascimento'],
            'cidade_nascimento' => $data['cidade_nascimento'],
            'estado_nascimento' => $data['estado_nascimento'],
            'endereco' =>  $endereco,
            'documentos' => [], 
        ]);

        $cliente->save();

        return redirect()->route('clients')->with('success', 'Cliente cadastrado com sucesso!');
    }
}
