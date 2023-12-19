<x-app-layout>
    <div class="appointments-content">
        <div class="appointments-left">
            <div class="appointments-header">
                <p>Registros</p>
                <input type="text" id="searchInput" placeholder="Pesquisar por nome">
            </div>

            <ul id="searchResults">
                @foreach ($atendimentos as $atendimento)
                <li class="searchable-li" id="moreContent{{ $loop->index }}">
                    <div class="appointment-content">
                        <h1 class="searchable-content">{{ $atendimento->nome }}</h1>
                        @foreach($cidades as $cidade)
                        @if($cidade->id === $atendimento->cidadeId)
                        <h2>{{ $cidade->nome }}</h2>
                        @endif
                        @endforeach
                        @foreach($ramos as $ramo)
                        @if($ramo->id === $atendimento->ramoId)
                        <h2>({{ $ramo->nome }})</h2>
                        @endif
                        @endforeach
                        <h3>{{ $atendimento->updated_at->format('d / m / Y - H:i') }}</h3>
                    </div>
                    <div class="more-content">
                    </div>
                    <x-jam-plus-rectangle-f class="appointment-icon" />
                    <p style="display: none;">{{ $atendimento->texto}}</p>
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
            let searchTerm = this.value.toLowerCase();

            // Obtenha a lista de resultados e os itens da lista
            let searchResults = document.getElementById('searchResults');
            let items = searchResults.getElementsByClassName('searchable-li');
            let names = searchResults.getElementsByClassName('searchable-content');

            // Itere sobre os itens e mostre/oculte com base na correspondência do termo de pesquisa
            for (let i = 0; i < items.length; i++) {
                let name = names[i];
                let item = items[i]
                let textContent = name.textContent || name.innerText;

                if (textContent.toLowerCase().includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            }
        });
        document.addEventListener('DOMContentLoaded', function () {
            // Adicione um ouvinte de evento a todos os elementos com a classe 'appointment-icon'
            document.querySelectorAll('.appointment-icon').forEach(function (icon, index) {
                icon.addEventListener('click', function () {
                    // Obtenha a div 'more-content' correspondente ao ícone clicado
                    var moreContent = document.getElementById('moreContent' + index);

                    // Alterne a classe 'expanded' na div 'more-content'
                    moreContent.classList.toggle('expanded');

                    // Exiba ou oculte o texto com base no estado da classe 'expanded'
                    var texto = moreContent.querySelector('p');
                    texto.style.display = moreContent.classList.contains('expanded') ? 'block' : 'none';
                });
            });
        });

    </script>
</x-app-layout>