<form class="create-atendimento-component" id="cadastroForm" method="POST">
    @csrf
    <label>Nome: <span>*</span></label>
    <input placeholder="Nome" name="nome" required type="text">
    <label>Cidade:<span>*</span></label>
    <select name="cidadeId">
        @foreach($cidades as $cidade)
        <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
        @endforeach
    </select>
    <label>Ramo Jurídico:<span>*</span></label>
    <select name="ramoId">
        @foreach($ramos as $ramo)
        <option value="{{ $ramo->id }}">{{ $ramo->nome }}</option>
        @endforeach
    </select>
    <label>Celular:</label>
    <input type="text" id="celular" name="celular" placeholder="(99) 99999-9999">
    <label>Registro do Atendimento:<span>*</span></label>
    <input name="texto" required type="text">
    <button type="button" id="btnCadastrar">
        <p>CADASTRAR</p>
    </button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function () {
        $('#celular').inputmask('(99) 99999-9999', { placeholder: ' ' });

        $('#btnCadastrar').click(function () {
            // Simula o envio do formulário usando Ajax
            $.ajax({
                type: 'POST',
                url: '{{ route("atendimento.post") }}',
                data: $('#cadastroForm').serialize(), // Serializa os dados do formulário
                success: function () {
                    alert('Cadastro realizado com sucesso!');
                    // Limpa os campos ou faça outras ações se necessário
                    $('#cadastroForm')[0].reset();
                },
                error: function () {
                    alert('Ocorreu um erro durante o cadastro.');
                }
            });
        });
    });
</script>