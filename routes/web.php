<?php

use Illuminate\Support\Facades\Route;

/* ROTAS QUE NÃO PASSAM PELO CONTROLLER
- Rota raiz */

Route::get('/', function () {
    return view('sistema.index');
});

// Rotas SEM autenticação

Route::get('/sobre', function () {
    return view('sistema.suporte.sobre');
});

Route::get('/funcionalidades', function () {
    return view('sistema.suporte.funcionalidades');
});

Route::get('/suporte', function () {
    return view('sistema.suporte.suporte');
});

// Rota PARA autenticar

Auth::routes();

/* Rotas COM autenticação
- DASHBOARDS */

Route::get('/dashboard', function () {
    return view('sistema.dashboard.dashboardClient');
});

Route::get('/dashboard/Prestador', function () {
    return view('sistema.dashboard.dashboardPrestador');
});

Route::get('/dashboard/Adm', function () {
    return view('sistema.dashboard.dashboardAdm');
});

Route::get('/dashboard/funcionalidades', function () {
    return view('sistema.suporte.funcionalidadesDash');
});

// Rotas COM autenticação - SUPORTE
Route::get('/dashboard/suporte', function () {
    return view('sistema.suporte.suporteDash');
});

Route::get('/dashboard/perfil', function () {
    return view('auth.profile');
});

// ROTAS QUE PASSAM PELO CONTROLLER

// HomeController

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Controller do Pedido

Route::get('/dashboard/pedidos', [App\Http\Controllers\controladorPedido::class, 'listaPedidos'])->name('listagemPedidos');

Route::get('/pedidos/{servico_id}', [App\Http\Controllers\controladorPedido::class, 'create'])->name('pedido');

Route::get('/pedidos/editar/{id}', [App\Http\Controllers\controladorPedido::class, 'edit'])->name('pedido');

Route::post('/pedidos/update/{id}', [App\Http\Controllers\controladorPedido::class, 'update'])->name('pedido');

Route::post('/pedidos/enviar', [App\Http\Controllers\controladorPedido::class, 'store'])->name('gravaNovoPedido');

Route::get('/pedidos/enviar/mail/{id}', [App\Http\Controllers\controladorPedido::class, 'enviarEmail'])->name('enviaEmails');

Route::get('/pedidos/aceitar/{user_id}/{pedido_id}', [App\Http\Controllers\controladorPedido::class, 'aceitar'])->name('aceitarPedido');

Route::get('/pedidos/salvar/{user_id}/{pedido_id}', [App\Http\Controllers\controladorPedido::class, 'apagarCandidatos']);


// Controller do Candidato

Route::post('/dashboard/pedidos/candidatar/{pedido_id}', [App\Http\Controllers\controladorCandidatos::class, 'store'])->name('candidatar');

Route::get('/dashboard/candidatos/{pedido_id}', [App\Http\Controllers\controladorCandidatos::class, 'show'])->name('verCandidatos');


// Controller do Serviço

Route::get('/dashboard/servicos', [App\Http\Controllers\controladorServico::class, 'index'])->name('listaAdm');

Route::get('/servicos/novo', [App\Http\Controllers\controladorServico::class, 'create'])->name('novoServico');

Route::post('/servico/add', [App\Http\Controllers\controladorServico::class, 'store'])->name('gravaNovoServico');

Route::get('/servico/editar/{id}', [App\Http\Controllers\controladorServico::class, 'edit'])->name('editaServico');

Route::post('/servico/update/{id}', [App\Http\Controllers\controladorServico::class, 'update'])->name('gravaServicoEditado');

Route::get('/servico/delete/{id}', [App\Http\Controllers\controladorServico::class, 'destroy'])->name('deletaServico');


//Controller do Profile

Route::get('/dashboard/perfil', [App\Http\Controllers\controladorProfile::class, 'index'])->name('perfil');

Route::post('/dashboard/perfil/atualizar/{id}', [App\Http\Controllers\controladorProfile::class, 'update'])->name('atualizaPerfil');

Route::get('/dashboard/avaliacao', [App\Http\Controllers\controladorProfile::class, 'editAvCliente'])->name('avaliaCliente');

Route::get('/dashboard/avaliar/{id}/{pedido_id}', [App\Http\Controllers\controladorProfile::class, 'editAvForm'])->name('AvaliarPrestador');

Route::post('/dashboard/avaliando/{id}/{pedido_id}', [App\Http\Controllers\controladorProfile::class, 'updateAv'])->name('gravaAvaliacao');


// Para rodar as imagens no site - usado no deploy no Hostinger
Route::get('/storage', function(){
    return \Illuminate\Support\Facades\Artisan::call('storage:link');
});