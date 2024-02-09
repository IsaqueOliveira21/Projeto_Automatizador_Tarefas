<?php

namespace App\Http\Controllers;

use App\Models\NotificacaoTarefa;
use App\Models\Tarefa;
use App\Services\NotificacaoTarefaService;
use App\Services\TarefaService;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificacaoTarefaController extends Controller
{
    private $service;

    public function __construct(NotificacaoTarefaService $service) {
        $this->service = $service;
    }

    public function index() {
        $notificacoes = $this->service->index();
        list($notificacoes, $notificacoesQtd) = $notificacoes;
        return view('clientes.notificacoes.index', compact('notificacoes','notificacoesQtd'));
    }

    public function visualizarNotificacao(NotificacaoTarefa $notificacao) {
        $notificacao->update([
            'visualizado' => 1,
        ]);
        return redirect()->back();
    }

    public function removerNotificacao(NotificacaoTarefa $notificacao) {
        $notificacao->delete();
        return redirect()->back();
    }
}
