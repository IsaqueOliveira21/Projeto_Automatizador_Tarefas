<?php

namespace App\Services;

use App\Models\NotificacaoTarefa;
use App\Models\Tarefa;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TarefaService
{
    private $tarefa;
    public function __construct(Tarefa $tarefa) {
        $this->tarefa = $tarefa;
    }

    public function index($search = null) {
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
                NotificacaoTarefa::create([
                    'user_id' => auth()->user()->id,
                    'tarefa_id' => $tarefa->id,
                ]);
            }
        }
        $tarefas = Auth::user()->tarefas()->get();
        return $tarefas;
    }

    public function store($input) {
        try {
            if(!isset($input['prazo'])) {
                $this->tarefa->create([
                    'user_id' => Auth::user()->id,
                    'titulo' => $input['titulo'],
                    'descricao' => $input['descricao'],
                    'data_inicio' => Carbon::now()->format('Y-m-d')
                ]);
            } else {
                $this->tarefa->create([
                    'user_id' => Auth::user()->id,
                    'titulo' => $input['titulo'],
                    'descricao' => $input['descricao'],
                    'data_inicio' => Carbon::now()->format('Y-m-d'),
                    'data_conclusao' => $input['prazo'],
                ]);
            }
            return "Tarefa criada com sucesso!";
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }

    public function concluirTarefa($tarefa) {
        try {
            if($tarefa->realizada == 0) {
                $tarefa->update([
                    'realizada' => 1,
                ]);
            } else {
                $tarefa->update([
                    'realizada' => 0,
                ]);
            }
            return redirect()->back();
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete($id) {
        $this->tarefa->find($id)->delete();
    }
}
