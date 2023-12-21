<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TesteController extends Controller
{
    public function index(){


        $estados = Http::get("https://servicodados.ibge.gov.br/api/v1/localidades/municipios");

        $jorge = json_decode($estados, true);

        dd( reset($jorge) , 'pare');
    }
}
