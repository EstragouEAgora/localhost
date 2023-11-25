<!-- Formulário para edição do serviço
    Campos: nome do serviço, foto do serviço -->
@extends('sistema.layout.layoutDash')
@section('title', 'Adm | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Editar Serviço</b></p>
        <p id="subtitulo-da-pagina">Edite o serviço criado</p>
        <div class="card" id="card-descricao-servico">
            <form method="POST" action="/servico/update/{{ $dados['id'] }}" enctype="multipart/form-data">
                @csrf
                <label for="descricaoPedido" id="card-descricao-valor">
                    <p class="h5">Nome do serviço:</p>
                </label>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <input type="text" class="form-control @error('nomeServico') is-invalid @enderror" name="nomeServico"
                        required autocomplete="nomeServico" style="border-radius: 40px; background-color: #EFF2FB"
                        value="{{ $dados['nomeServico'] }}">
                    @error('nomeServico')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <label for="descricaoPedido" id="card-descricao-valor">
                    <p class="h5">Adicionar imagem:</p>
                </label>
                <div style="margin-left: 10px; margin-right: 30px;">
                    <input type="file" class="form-control" name="fotoServico" autocomplete="fotoServico"
                        style="border-radius: 40px; background-color: #EFF2FB">
                </div>

                <div style="display: flex; justify-content: flex-end">
                    <button id="botaozin-padrao">
                        <a id="link-sem-sublinhado" style="color: white"href="/home">Cancelar</a>

                    </button>
                    <button id="botaozin-padrao">
                        <a id="link-sem-sublinhado" style="color: white">Salvar alterações</a>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(document).ready(function($)) {
            $('#valor').mask('R$ 999,99');
        }
    </script>

@endsection
