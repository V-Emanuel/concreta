<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atendimento;
use App\Models\Cidade;
use App\Models\Ramo;
use App\Models\Cliente;
use GuzzleHttp\Client;


class HeaderViewsController extends Controller
{
    public function appointmentsView()
    {
        $atendimentos = Atendimento::all();
        $cidades = Cidade::all();
        $ramos = Ramo::all();

        return view("appointments", compact("atendimentos", "cidades","ramos"));
    }

    public function clientsView()
    {
        $clientes = Cliente::all();
        $cidades = Cidade::all();
        $ramos = Ramo::all();

        $estados = [];
        $municipios = [];

        $urlEstados = "https://servicodados.ibge.gov.br/api/v1/localidades/estados";
        $urlMunicipios = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios";

        $client = new Client();

        try{

            $estados = $client->request("GET", $urlEstados);
            $municipios = $client->request("GET", $urlMunicipios);

            return view("clients", compact("clientes", "cidades","ramos", "municipios", "estados"));

        }catch(\Exception $e){
            return view("clients", compact("clientes", "cidades","ramos", "municipios", "estados"));
        }

    }
}
