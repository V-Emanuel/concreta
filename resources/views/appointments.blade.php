<x-app-layout>
    <div class="appointments-content">
        <div class="appointments-left">
            <div class="appointments-header">
                <p>Registros</p>
                <input type="text" id="searchInput" placeholder="Pesquisar por nome">
            </div>

            <ul id="searchResults">
                @foreach ($atendimentos as $atendimento)
                <li class="searchable">
                    <h1>{{ $atendimento->nome }}</h1>
                    @foreach($ramos as $ramo)
                    @if($ramo->id === $atendimento->ramoId)
                    <h2>({{ $ramo->nome }})</h2>
                    @endif
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>

        <div class="appointments-right">
            <p class='form-title'>Registrar Atendimento</p>
            <x-novo-atendimento />
        </div>
    </div>

    <script>
        // Adicione um ouvinte de evento ao campo de pesquisa
        document.getElementById('searchInput').addEventListener('input', function () {
            // Obtenha o valor do campo de pesquisa
            var searchTerm = this.value.toLowerCase();

            // Obtenha a lista de resultados e os itens da lista
            var searchResults = document.getElementById('searchResults');
            var items = searchResults.getElementsByClassName('searchable');

            // Itere sobre os itens e mostre/oculte com base na correspondência do termo de pesquisa
            for (var i = 0; i < items.length; i++) {
                var item = items[i];
                var textContent = item.textContent || item.innerText;

                if (textContent.toLowerCase().includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }
        });
    </script>
</x-app-layout>