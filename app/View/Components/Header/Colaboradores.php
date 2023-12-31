<?php

namespace App\View\Components\Header;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\User;

class Colaboradores extends Component
{
    public $colaboradores;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->colaboradores = User::where('admin_id', 0)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header.colaboradores');
    }
}
