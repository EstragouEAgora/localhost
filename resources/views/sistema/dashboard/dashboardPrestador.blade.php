<!-- Dashboard do prestador - apresenta os dados de todos os pedidos cadastrados 
    para os serviços que o profissional logado presta e apresenta a opção de
    candidatar-se a eles. -->
@extends('sistema.layout.layoutDash')
@section('title', 'Home | Estragou, e agora?')
@section('content')
    <!-- div que permite aparecer mensagem de sucesso ou erro na página -->
    <div class="container" style="margin-top: 150px">
        <div class="card border" style="margin-top: 60px; border: none; background-color: #28a745; ">
            @if (session()->get('danger'))
                <div class="alert alert-danger">
                    {{ session()->get('danger') }}
                </div><br />
            @elseif (session()->get('success'))
                <div class="alert alert-success"
                    style="text-align: center; padding: 5px; margin: 0; border: none; background-color: #28a745;">
                    <div style="display: flex; align-items: center; justify-content: center;">
                        <span style="font-size: 18px; color: white;">{{ session()->get('success') }}</span>
                    </div>
                </div><br />
            @endif
        </div>
        <p class="h1 text-start" id="titulo-da-pagina"><b>Serviços para você</b></p>
        <p id="subtitulo-da-pagina">Pedidos para você! Dê uma olhada e se candidate!</p>
        @forelse ($servicos as $item)
            @foreach ($item->servico->pedido as $value)
                @if ($value['status'] != 1)
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <p class="h5 card-title">
                                        <span
                                            style="color: #3c5bbf; font-weight: bold;">{{ $item->servico->nomeServico }}</span>
                                    </p>
                                    @if ($value->fotoPedido != '')
                                        <img class="h5 card-icon" src="/storage/{{ $value->fotoPedido }}"
                                            style="max-width: 180px; max-height: 300px">
                                    @endif
                                    <p class="card-text"><b>Descrição:</b>{{ $value->descricaoPedido }}</p>
                                    <p class="card-text"><b>Cliente: {{ $value->user->apelido }}</b> -
                                        {{ $value->user->name }}</p>
                                    <img class="h5 card-icon" src="/storage/{{ $value->user->fotoPerfil }}"
                                        style="max-width: 100px; max-height: 200px" />
                                    <br>
                                    @if ($value->user->avaliacao != 5)
                                        @if ($value->user->avaliacao == 6)
                                            <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                            <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                            <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                            <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                            <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                            <p>Ainda não avaliado!</p>
                                        @else
                                            @for ($i = 0; $i < $value->user->avaliacao; $i++)
                                                <img src="{{ asset('storage/imagens/star-fill.svg') }}"
                                                    style="width: 2rem;">
                                            @endfor
                                            @for ($i = 0; $i < $value->user->resto; $i++)
                                                <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                            @endfor
                                        @endif
                                    @else
                                        @for ($i = 0; $i < $value->user->avaliacao; $i++)
                                            <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                                        @endfor
                                    @endif
                                    <p class="card-text"><b>Endereço:</b>{{ $value->endereco }}</p>
                                    <p class="card-text"><b>Valor Sugerido:</b> R$ {{ $value->valorPedido }}</p>
                                    <form method="POST" action="/dashboard/pedidos/candidatar/{{ $value->id }}">
                                        @csrf
                                        <div class="campo-novo-valor" style="display: none;"
                                            id="campo-novo-valor-{{ $value->id }}">
                                            <label for="novoValor" class="h4 label-align"
                                                style="margin-left: 10px; margin-right: 30px; margin-top: 30px;">Valor
                                                (R$)
                                                :</label>
                                            <p id="card-descricao-label-subtitulo">Sugira um novo valor para tal serviço...
                                            </p>
                                            <div id="card-descricao-valor">
                                                <input id="novoValor" type="text" class="form-control valor"
                                                    name="novoValor" required autocomplete="valorPedido"
                                                    style="border-radius: 40px; background-color: #EFF2FB"
                                                    value={{ $value->valorPedido }}>
                                            </div>
                                            <button class="btn btn-secondary" id="botaozin-padrao">Candidatar-me</button>
                                        </div>
                                        <div class="campo-novo-valor">
                                            <a class="btn btn-secondary botao-candidatar" id="botaozin-padrao"
                                                data-id={{ $value->id }}> Candidatar-me </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @empty
            <p class="h1 text-start" id="subtitulo-da-pagina"><b>Voce ainda não se cadastrou em nenhum serviço!</b></p>
            <p id="subtitulo-da-pagina">Vá até o seu <a href="/dashboard/perfil" id="link-sem-sublinhado">Perfil</a> e
                associe-se a algum serviço!!</p>
        @endforelse
    </div>
@endsection
@section('javascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const botoesCandidatar = document.querySelectorAll('.botao-candidatar');

            botoesCandidatar.forEach(botao => {
                botao.addEventListener('click', function() {
                    const id = botao.getAttribute('data-id');
                    const campoNovoValor = document.querySelector(`#campo-novo-valor-${id}`);

                    if (campoNovoValor) {
                        if (campoNovoValor.style.display === 'none' || campoNovoValor.style
                            .display === '') {
                            campoNovoValor.style.display = 'block';
                            botao.innerText = 'Cancelar';
                        } else {
                            campoNovoValor.style.display = 'none';
                            botao.innerText = 'Candidatar-me';
                        }
                    } else {
                        console.log(`Elemento com ID 'campo-novo-valor-${id}' não encontrado.`);
                    }
                });
            });
        });
    </script>
@endsection
