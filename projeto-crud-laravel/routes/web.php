<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensagemController;
use App\Http\Controllers\ClienteController;

Route::get('/', [HomeController::class,'index']);



Route::get("/mensagem/{mensagem}", [MensagemController::class, 'mostrarMensagem']);



Route::resources([
    'clientes' => ClienteController::class,
    'alunos' => AlunoController::class
    #produtos => ProdutoController::class
]);

Route::get('/clientes/delete/{id}', [ClienteController::class, 'delete']);

Route::get('/alunos/delete/{id}', [AlunoController::class, 'delete'])->name('alunos.delete');
