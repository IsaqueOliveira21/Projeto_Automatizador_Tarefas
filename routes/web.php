<?php

use App\Http\Controllers\CronogramaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/denied', [UserController::class, 'accessDenied'])->name('login');
Route::get('/', [UserController::class, 'login'])->name('user.login');
Route::get('/create', [UserController::class, 'create'])->name('user.create');
Route::post('/store', [UserController::class, 'store'])->name('user.store');
Route::post('/login', [UserController::class, 'formLogin'])->name('user.formLogin');

Route::prefix('autotask')->middleware('auth')->group(function() {
    Route::prefix('atividades')->controller(DashboardController::class)->group(function() {
        Route::get('index', 'index')->name('dashboard.index');
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/update', [UserController::class, 'update'])->name('user.update');
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
