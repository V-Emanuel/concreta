<?php

namespace App\View\Components;

use App\Models\Cidade;
use App\Models\Ramo;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class NovoAtendimento extends Component
{
    public $cidades;
    public $ramos;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->cidades = Cidade::all();
        $this->ramos = Ramo::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.novo-atendimento');
    }
}
