<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="dashboard-content">
        <ul class="dashboard-services">
            <li>
                <p>Cadastrar Atendimento</p>
                <button>+</button>
            </li>
            <x-novo-atendimento/>
            <li>
                <p>Templates</p>
                <button>+</button>
            </li>
        </ul>
    </div>
</x-app-layout>
