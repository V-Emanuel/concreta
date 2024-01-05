<x-app-layout>
    <div class="appointments-content">
        <div class="appointments-left">
            <div class="appointments-header">
                <p>Registros</p>
                <input type="text" id="searchInput" placeholder="Pesquisar por nome">
                <x-jam-plus-rectangle-f class="add-register-icon" />
            </div>
            <x-atendimentos />
        </div>
        <div class="appointments-right no-active-x">
            <x-bi-arrow-right-square-fill class="close-register-icon" />
            <p class='form-title'>Registrar Atendimento</p>
            <x-novo-atendimento />
        </div>
        <div class="no-active-opacity opacity-bg"></div>
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
            <h1> Por Data: </h1>
            <div class="filter-line"></div>
            <div class="date-filter-container">
                <label for="startDate">De:</label>
                <input type="date" id="startDate">
                <br />
                <label for="endDate">Até:</label>
                <input type="date" id="endDate">
            </div>
        </div>
        <script>

            document.getElementById('searchInput').addEventListener('input', function () {

                let searchTerm = this.value.toLowerCase();

                let searchResults = document.getElementById('searchResults');
                let items = searchResults.getElementsByClassName('searchable-li');
                let names = searchResults.getElementsByClassName('searchable-content');

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
                document.querySelectorAll('.add-register-icon').forEach(function (icon) {
                    icon.addEventListener('click', function () {
                        let appointmentsRight = document.querySelector('.appointments-right');
                        let opacityBg = document.querySelector('.opacity-bg');

                        appointmentsRight.classList.toggle('active-x');
                        appointmentsRight.classList.toggle('no-active-x');
                        opacityBg.classList.toggle('active-opacity');
                        opacityBg.classList.toggle('no-active-opacity');

                    });
                });

                document.querySelectorAll('.close-register-icon').forEach(function (icon) {
                    icon.addEventListener('click', function () {
                        let appointmentsRight = document.querySelector('.appointments-right');
                        let opacityBg = document.querySelector('.opacity-bg');

                        appointmentsRight.classList.toggle('active-x');
                        appointmentsRight.classList.toggle('no-active-x');
                        opacityBg.classList.toggle('active-opacity');
                        opacityBg.classList.toggle('no-active-opacity');

                    });
                });
            });

            document.addEventListener('DOMContentLoaded', function () {

                document.querySelectorAll('.appointment-icon').forEach(function (icon, index) {
                    icon.addEventListener('click', function () {

                        var moreContent = document.getElementById('moreContent' + index);

                        moreContent.classList.toggle('expanded');

                        var texto = moreContent.querySelector('p');
                        texto.style.display = moreContent.classList.contains('expanded') ? 'block' : 'none';
                    });
                });
            });

            document.addEventListener('DOMContentLoaded', function () {

                document.querySelectorAll('.checkbox-cidade').forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        filterAtendimentos();
                    });
                });

                document.querySelectorAll('.checkbox-ramo').forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        filterAtendimentos();
                    });
                });

                document.getElementById('startDate').addEventListener('change', function () {
                    filterAtendimentos();
                });

                document.getElementById('endDate').addEventListener('change', function () {
                    filterAtendimentos();
                });

                function filterAtendimentos() {
                    let cidadesSelecionadas = Array.from(document.querySelectorAll('.checkbox-cidade:checked')).map(checkbox => checkbox.dataset.cidade);
                    let ramosSelecionados = Array.from(document.querySelectorAll('.checkbox-ramo:checked')).map(checkbox => checkbox.dataset.ramo);
                    let startDate = document.getElementById('startDate').value;
                    let endDate = document.getElementById('endDate').value;

                    let atendimentos = document.getElementsByClassName('searchable-li');

                    for (let i = 0; i < atendimentos.length; i++) {
                        let atendimento = atendimentos[i];
                        let cidadeAtendimento = atendimento.dataset.cidade;
                        let ramoAtendimento = atendimento.dataset.ramo;
                        let dataAtendimento = atendimento.dataset.data;

                        let cidadeFiltrada = cidadesSelecionadas.length === 0 || cidadesSelecionadas.includes(cidadeAtendimento);
                        let ramoFiltrado = ramosSelecionados.length === 0 || ramosSelecionados.includes(ramoAtendimento);
                        let dataFiltrada = (startDate === '' || dataAtendimento >= startDate) && (endDate === '' || dataAtendimento <= endDate);

                        atendimento.style.display = cidadeFiltrada && ramoFiltrado && dataFiltrada ? 'block' : 'none';
                    }
                }
            });
        </script>
</x-app-layout>