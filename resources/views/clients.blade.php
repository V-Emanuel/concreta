<x-app-layout>
    <div class="clients-content">
        <header class="clients-header">
            <p>clientes</p>
            <x-jam-plus-rectangle-f class="add-client-icon" />
        </header>
        <div class=".no-active-x clients-right">
            <x-bi-arrow-right-square-fill class="close-client-icon" />
            <p class='form-title'>Registrar Cliente</p>
            <x-novo-cliente />
        </div>
        <div class=".no-active-opacity client-opacity-bg"></div>
        <div class="all-clients">
            @foreach($clientes as $cliente)
            <div class="client-container">
                <p>{{$cliente->nome}}</p>
                <x-tabler-arrow-big-down-lines-filled class="arrow-icon" />
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
                let appointmentsRight = document.querySelector('.clients-right');
                let opacityBg = document.querySelector('.client-opacity-bg');

                appointmentsRight.classList.toggle('active-x');
                appointmentsRight.classList.toggle('no-active-x');
                opacityBg.classList.toggle('active-opacity');
                opacityBg.classList.toggle('no-active-opacity');

            });
        });

        document.querySelectorAll('.close-client-icon').forEach(function (icon) {
            icon.addEventListener('click', function () {
                let appointmentsRight = document.querySelector('.clients-right');
                let opacityBg = document.querySelector('.client-opacity-bg');

                appointmentsRight.classList.toggle('active-x');
                appointmentsRight.classList.toggle('no-active-x');
                opacityBg.classList.toggle('active-opacity');
                opacityBg.classList.toggle('no-active-opacity');

            });
        });
    });
</script>