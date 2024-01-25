<?php

use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificacaoTarefaController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]); // Verifica se o email do usuario foi verificado, se sim, permite o acesso

Route::get('/denied', [UserController::class, 'accessDenied'])->name('login');
Route::get('/', [UserController::class, 'login'])->name('user.login');
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::get('/confirmEmail/{user}', [UserController::class, 'confirmEmail'])->name('user.confirmEmail');
Route::get('/resendEmail/{user}', [UserController::class, 'resendEmail'])->name('user.resendEmail');
Route::get('/forgotPassword', [UserController::class, 'forgotPassword'])->name('user.forgotPassword');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::post('/login', [UserController::class, 'formLogin'])->name('user.formLogin');

Route::get('teste-envio-email', function () {
    Mail::to('isaque16.oliveira@gmail.com')->send(new \App\Mail\TesteEnvioMail());
});

Route::prefix('autotask')->middleware(['auth', 'verified'])->group(function() {
    Route::prefix('atividades')->controller(DashboardController::class)->group(function() {
        Route::get('index', 'index')->name('dashboard.index');
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update', [UserController::class, 'update'])->name('user.update');
    Route::prefix('notificacoes')->controller(NotificacaoTarefaController::class)->group(function () {
        Route::get('index', 'index')->name('notificacoes.index');
        Route::get('visualizar/{notificacao}', 'visualizarNotificacao')->name('notificacoes.visualizar');
        Route::get('delete/{notificacao}', 'removerNotificacao')->name('notificacoes.delete');
    });
    Route::prefix('tarefas')->controller(TarefaController::class)->group(function() {
        Route::get('index', 'index')->name('tarefas.index');
        Route::get('concluir-tarefa/{tarefa}', 'concluirTarefa')->name('tarefas.concluir');
        Route::get('delete', 'delete')->name('tarefas.delete');
        Route::post('store', 'store')->name('tarefas.store');
    });
    Route::prefix('cronograma')->controller(CronogramaController::class)->group(function() {
        Route::get('index', 'index')->name('cronograma.index');
        Route::get('create', 'create')->name('cronograma.create');
        Route::get('delete', 'delete')->name('cronograma.delete');
        Route::get('deleteAll', 'deleteAll')->name('cronograma.deleteAll');
        Route::put('edit/{atividade}', 'edit')->name('cronograma.edit');
        Route::post('store', 'store')->name('cronograma.store');
    });
});
