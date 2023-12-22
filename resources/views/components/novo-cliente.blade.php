<form class="create-cliente-component" id="cadastroForm" method="POST">
    @csrf
    <label>Nome:<span style="color: red"> *</span></label>
    <input placeholder="Nome" name="nome" required type="text">
    <label>Naturalidade:<span style="color: red"> *</span></label>
    <select id="naturalidade" name="naturalidade" onchange="atualizarEstadoCivil(); ocultarCampoOutro()">
        <option id="brasileiro" value="brasileiro">brasileiro</option>
        <option id="brasileira" value="brasileira">brasileira</option>
        <option value="outro">Outro</option>
    </select>
    <div id="campoOutro" style="display: none;">
        <label for="outro">Digite a opção:</label>
        <input type="text" id="outro" name="naturalidade">
    </div>
    <label>Estado Civil:<span style="color: red"> *</span></label>
    <select id="estado_civil" name="estado_civil">
    </select>
    <label>Profissão:<span style="color: red"> *</span></label>
    <input placeholder="Profissão" name="profissao" required type="text">
    <label>Nome da Mãe:<span style="color: red"> *</span></label>
    <input placeholder="Mãe" name="nome_mae" required type="text">
    <label>Nome do Pai: </label>
    <input placeholder="Pai" name="nome_pai" required type="text">
    <label>RG:<span style="color: red"> *</span></label>
    <input placeholder="RG" name="rg" required type="text">
    <label>CPF:<span style="color: red"> *</span></label>
    <input placeholder="CPF" name="cpf" required type="text">
    <label>Celular:</label>
    <input type="text" id="celular" name="celular" placeholder="(99) 99999-9999">
    <label class="label-endereco">Endereço:<span style="color: red"> *</span></label>
    <div class="cliente-endereco-container">
        <div class="endereco-section primeiro">
            <h6>CEP:<span style="color: red"> *</span></h6>
            <input placeholder="CEP" name="cep" required type="text">
        </div>
        <div class="endereco-section segundo">
            <h6>Rua:<span style="color: red"> *</span></h6>
            <input placeholder="Rua" name="rua" required type="text">
        </div>
        <div class="endereco-section terceiro">
            <h6>Bairro:<span style="color: red"> *</span></h6>
            <input name="bairro" required type="text">
        </div>
        <div class="endereco-section quarto">
            <h6>Número:<span style="color: red"> *</span></h6>
            <input name="numero" required type="text">
        </div>
        <div class="endereco-section quinto">
            <h6>Estado:<span style="color: red"> *</span></h6>
            <input name="estado" required type="text">
        </div>
        <div class="endereco-section sexto">
            <h6>Cidade:<span style="color: red"> *</span></h6>
            <input name="cidade" required type="text">
        </div>

    </div>

    <p>CADASTRAR</p>
    </button>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script>
    $(document).ready(function () {
        $('#celular').inputmask('(99) 99999-9999', { placeholder: ' ' });

        $('#btnCadastrar').click(function () {
            $.ajax({
                type: 'POST',
                url: '{{ route("cliente.post") }}',
                data: $('#cadastroForm').serialize(),
                success: function () {
                    alert('Cadastro de cliente realizado com sucesso!');
                    $('#cadastroForm')[0].reset();
                },
                error: function () {
                    alert('Ocorreu um erro durante o cadastro do cliente.');
                }
            });
        });

    });

    function atualizarEstadoCivil() {

        let estadoCivilSelect = document.getElementById('estado_civil');
        estadoCivilSelect.innerHTML = '';

        let naturalidadeSelect = document.getElementById('naturalidade');
        let naturalidadeValue = naturalidadeSelect.value;

        if (naturalidadeValue === 'brasileiro') {
            adicionarOpcao('solteiro', 'solteiro');
            adicionarOpcao('casado', 'casado');
            adicionarOpcao('divorciado', 'divorciado');
            adicionarOpcao('viuvo', 'viúvo');
        } else if (naturalidadeValue === 'brasileira') {
            adicionarOpcao('solteira', 'solteira');
            adicionarOpcao('casada', 'casada');
            adicionarOpcao('divorciada', 'divorciada');
            adicionarOpcao('viuva', 'viúva');
        } else if (naturalidadeValue === 'outro') {
            mostrarCampoOutro();
            adicionarOpcao('solteiro(a)', 'solteiro(a)');
            adicionarOpcao('casado(a)', 'casado(a)');
            adicionarOpcao('divorciado(a)', 'divorciado(a)');
            adicionarOpcao('viuvo(a)', 'viúvo(a)');
        }

    }

    function adicionarOpcao(value, text) {
        let option = document.createElement('option');
        option.value = value;
        option.text = text;
        document.getElementById('estado_civil').appendChild(option);
    }

    function mostrarCampoOutro() {
        let select = document.getElementById('naturalidade');
        let campoOutro = document.getElementById('campoOutro');

        campoOutro.style.display = select.value === 'outro' ? 'block' : 'none';

        if (select.value !== 'outro') {
            document.getElementById('outro').value = '';
        }
    }

    function ocultarCampoOutro() {
        var select = document.getElementById('naturalidade');
        var campoOutro = document.getElementById('campoOutro');

        // Oculta o campo de texto se a opção for "brasileiro" ou "brasileira"
        if (select.value === 'brasileiro' || select.value === 'brasileira') {
            campoOutro.style.display = 'none';
            document.getElementById('outro').value = ''; // Limpa o valor do campo "outro"
        } else {
            campoOutro.style.display = 'block';
        }
    }

    atualizarEstadoCivil();
</script>