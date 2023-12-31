<!-- Página que mostra os dados do candidato que foi aceito pelo cliente em 
    determinado pedido. Os dados mostrados são: foto de perfil, apelido,
    telefone e email -->    
@extends('sistema.layout.layoutDash')
@section('title', 'Candidato | Estragou, e agora?')
@section('content')
    <div class="container">
        <p class="h1 text-start" id="titulo-da-pagina"><b>Candidatos</b></p>
        <p id="subtitulo-da-pagina">Esse número <b>não</b> ficará disponível novamente!</p>
        <p class="danger">Para entrar em contato com {{ $candidato[0]->apelido }}, chame no WhatsApp utilizando esse telefone ou mande um e-mail!</p>
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <img class="h5 card-icon" src="/storage/{{ $candidato[0]->fotoPerfil }}">
                        <p class="h5 card-title">
                            <span style="color: #3c5bbf; font-weight: bold;">{{ $candidato[0]->apelido }}</span>
                        </p>
                        <p class="card-text"><b>Telefone: </b>{{ $candidato[0]->telefone }}</p>
                        <p class="card-text"><b>Email: </b>{{ $candidato[0]->email }}</p>
                    </div>
                    <a href="/pedidos/salvar/{{ $candidato[0]->user_id }}/{{ $candidato[0]->pedido_id}}">
                        <button class="btn btn-secondary" id="botaozin-padrao">Salvar</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

