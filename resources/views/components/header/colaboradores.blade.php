<li class="hidden sm:flex sm:items-center sm:ms-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button
                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-w dark:text-gray-400 dark:bg-gray-80 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                <div> Colaboradores </div>

                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>


        <x-slot name="content">
            @foreach ($colaboradores as $colaborador)
            <x-dropdown-link :href="route('profile.edit')">
                {{$colaborador->name}}
            </x-dropdown-link>
            @endforeach
        </x-slot>
    </x-dropdown>
</li>

<!-- :href="route('profile.edit', ['id' => $colaboradores->id])" -->