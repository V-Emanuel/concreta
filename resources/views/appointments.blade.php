<x-app-layout>
    <div class="appointments-content">
        <div class="appointments-left">
            <div class="appointments-header">
                <p>Registros</p>
                <input type="text" id="searchInput" placeholder="Pesquisar por nome">
                <x-fas-filter class="filter-icon" />
            </div>
            <x-atendimentos/>
        </div>
        <div class="appointments-right">
            <x-bi-arrow-right-square-fill class="close-register-icon" />
            <p class='form-title'>Registrar Atendimento</p>
            <x-novo-atendimento />
        </div>
        <div class="opacity-bg"></div>
        <div class="filter-column">
            <p>Filtrar Registros</p>

            <h1> Por Cidade: </h1>
            <div class="filter-line"></div>

            @foreach($cidades as $cidade)
            <div class="checkbox-container">
                <input type="checkbox" class="checkbox-cidade" data-cidade="{{ $cidade->id }}" />
                <h3>{{$cidade->nome}}</h3>
            </div>
            @endforeach

            <h1> Por Tipo: </h1>
            <div class="filter-line"></div>

            @foreach($ramos as $ramo)
            <div class="checkbox-container">
                <input type="checkbox" class="checkbox-ramo" data-ramo="{{ $ramo->id }}" />
                <h3>{{$ramo->nome}}</h3>
            </div>
            @endforeach
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

            document.addEventListener('DOMContentLoaded', function () {
                // Adicione um ouvinte de evento aos checkboxes de cidade
                document.querySelectorAll('.checkbox-cidade').forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        filterAtendimentos();
                    });
                });

                // Adicione um ouvinte de evento aos checkboxes de ramo
                document.querySelectorAll('.checkbox-ramo').forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        filterAtendimentos();
                    });
                });

                // Função para filtrar os atendimentos com base nos checkboxes selecionados
                function filterAtendimentos() {
                    let cidadesSelecionadas = Array.from(document.querySelectorAll('.checkbox-cidade:checked')).map(checkbox => checkbox.dataset.cidade);
                    let ramosSelecionados = Array.from(document.querySelectorAll('.checkbox-ramo:checked')).map(checkbox => checkbox.dataset.ramo);

                    // Itere sobre os atendimentos e mostre/oculte com base nos checkboxes selecionados
                    let atendimentos = document.getElementsByClassName('searchable-li');

                    for (let i = 0; i < atendimentos.length; i++) {
                        let atendimento = atendimentos[i];
                        let cidadeAtendimento = atendimento.dataset.cidade;
                        let ramoAtendimento = atendimento.dataset.ramo;

                        // Verifique se o atendimento atende aos critérios de filtragem
                        let cidadeFiltrada = cidadesSelecionadas.length === 0 || cidadesSelecionadas.includes(cidadeAtendimento);
                        let ramoFiltrado = ramosSelecionados.length === 0 || ramosSelecionados.includes(ramoAtendimento);

                        // Exiba ou oculte o atendimento com base nos checkboxes selecionados
                        atendimento.style.display = cidadeFiltrada && ramoFiltrado ? 'block' : 'none';
                    }
                }
            });
        </script>
</x-app-layout>