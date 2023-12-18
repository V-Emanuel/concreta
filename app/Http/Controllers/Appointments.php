<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Ramo;
use Illuminate\Http\Request;
use App\Models\Atendimento;

class Appointments extends Controller
{
    public function index()
    {
        $atendimentos = Atendimento::all();
        $cidades = Cidade::all();
        $ramos = Ramo::all();

        return view("appointments", compact("atendimentos", "cidades","ramos"));
    }
}
