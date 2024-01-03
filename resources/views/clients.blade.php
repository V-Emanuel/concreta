<x-app-layout>
    <div class="clients-content">
        <header class="clients-header">
            <p>clientes</p>
            <x-jam-plus-rectangle-f class="add-client-icon" />
        </header>
        <div style="display: none;" class="clients-right">
            <x-bi-arrow-right-square-fill class="close-client-icon" />
            <p class='form-title'>Registrar Cliente</p>
            <x-novo-cliente />
        </div>
        <div style="display: none;" class="client-opacity-bg"></div>
        <div class="all-clients">
            @foreach($clientes as $cliente)
            <div class="client-container">
                <p>{{$cliente->nome}}</p>
                <x-tabler-arrow-big-down-lines-filled class="arrow-icon"/>
            </div>
            <div class="client-info">
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
                <p></p>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.add-client-icon').forEach(function (icon) {
            icon.addEventListener('click', function () {
                let clientsRight = document.querySelector('.clients-right');
                let opacityBg = document.querySelector('.client-opacity-bg');

                clientsRight.style.display = 'flex';
                opacityBg.style.display = 'flex';
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.close-client-icon').forEach(function (icon) {
            icon.addEventListener('click', function () {
                let clientsRight = document.querySelector('.clients-right');
                let opacityBg = document.querySelector('.client-opacity-bg');

                clientsRight.style.display = 'none';
                opacityBg.style.display = 'none';
            });
        });
    });
</script>