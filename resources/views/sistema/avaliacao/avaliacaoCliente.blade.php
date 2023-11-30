<!--Página que mostra a avaliação do prestador escolhido (na forma de estrelas) e
        que apresenta um botão para o cliente avaliá-lo.
    -->
@extends('sistema.layout.layoutDash')
@section('title', 'Avaliação | Estragou, e agora?')
@section('content')
    <!-- div que permite aparecer mensagem de sucesso ou erro na página -->
    <div class="container">
        <div class="card border" style="margin-top: 60px; border: none;">
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
        <p class="h1 text-start" id="titulo-da-pagina"><b>Avaliação dos clientes</b></p>
        @forelse ($pedidos as $item)
            @if ($item->status == 1)
                <p id="subtitulo-da-pagina">Esses são os clientes aos quais você se candidatou...</p>
                <div class="row">
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <p class="h5 card-title" style="color: #3c5bbf; font-weight: bold;">
                                    {{ $item->user->apelido }}
                                <p class="card-text"><b>Nome: </b>{{ $item->user->name }}</p>
                                <img class="h5 card-icon" src="/storage/{{ $item->user->fotoPerfil }}"
                                    style="max-width: 100px; max-height: 200px" />
                                <br>
                                @if ($item->user->avaliacao != 5)
                                    @if ($item->user->avaliacao == 6)
                                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                        <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                        <p>Ainda não avaliado!</p>
                                    @else
                                        @for ($i = 0; $i < $item->user->avaliacao; $i++)
                                            <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                                        @endfor
                                        @for ($i = 0; $i < $item->user->resto; $i++)
                                            <img src="{{ asset('storage/imagens/star.svg') }}" style="width: 2rem;">
                                        @endfor
                                    @endif
                                @else
                                    @for ($i = 0; $i < $item->user->avaliacao; $i++)
                                        <img src="{{ asset('storage/imagens/star-fill.svg') }}" style="width: 2rem;">
                                    @endfor
                                @endif
                                <a href="/dashboard/avaliar/{{ $item['user_id'] }}/{{ $item['id'] }}">
                                    <button class="btn btn-secondary" id="botaozin-padrao">
                                        Avaliar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <p class="h1 text-start" id="subtitulo-da-pagina"><b>Você ainda não pode avaliar ninguém...</b></p>
            <p id="subtitulo-da-pagina">Candidate-se a algum serviço primeiro e depois de prestá-lo, poderá avaliar seu
                cliente...</p>
        @endforelse
    </div>
@endsection
