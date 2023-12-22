<x-app-layout>
    <div class="clients-content">
        <header class="clients-header">
            <p>clientes</p>
            <x-jam-plus-rectangle-f class="add-client-icon" />
        </header>
        <div class="clients-right">
            <x-bi-arrow-right-square-fill class="close-client-icon" />
            <p class='form-title'>Registrar Cliente</p>
            <x-novo-cliente/>
        </div>
        <div class="client-opacity-bg"></div>
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