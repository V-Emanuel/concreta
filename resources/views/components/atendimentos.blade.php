<ul id="searchResults">
    @foreach ($atendimentos as $atendimento)
    <li class="searchable-li" id="moreContent{{ $loop->index }}">
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
        <x-jam-plus-rectangle-f class="appointment-icon" />
        <p style="display: none;">{{ $atendimento->texto}}</p>
    </li>
    @endforeach
</ul>