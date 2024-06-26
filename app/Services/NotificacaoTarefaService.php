<?php

namespace App\Services;

use App\Models\NotificacaoTarefa;
use App\Models\Tarefa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class NotificacaoTarefaService
{
    private $notificacaoTarefa;

    public function __construct(NotificacaoTarefa $notificacaoTarefa) {
        $this->notificacaoTarefa = $notificacaoTarefa;
    }

    public function index() {
        $notificacoesIds = [];
        $notificacoes = DB::table('notificacoes_tarefas')
            ->join('tarefas', 'notificacoes_tarefas.tarefa_id', '=', 'tarefas.id')
            ->selectRaw('notificacoes_tarefas.id, tarefas.id AS tarefa_id, notificacoes_tarefas.visualizado, notificacoes_tarefas.deleted_at AS removido_em, tarefas.titulo')
            ->where('notificacoes_tarefas.user_id', auth()->user()->id)
            ->where('tarefas.realizada', 0)
            ->orderBy('notificacoes_tarefas.id', 'DESC')
            ->get();
        foreach($notificacoes as $notificacao) {
            $notificacoesIds[] = $notificacao->tarefa_id;
        }
        $tarefas = Tarefa::where('user_id', auth()->user()->id)
            ->where('realizada', 0)
            ->whereNotNull('data_conclusao')
            ->get();
        foreach($tarefas as $tarefa) {
            if(!in_array($tarefa->id, $notificacoesIds)) {
                if(Carbon::now()->format('Y-m-d') > $tarefa->data_conclusao) {
                    NotificacaoTarefa::create([
                        'user_id' => auth()->user()->id,
                        'tarefa_id' => $tarefa->id,
                    ]);
                }
            }
        }
        $notificacoesQtd = count(NotificacaoTarefa::where('user_id', auth()->user()->id)->get());
        return [$notificacoes, $notificacoesQtd];
    }
}
