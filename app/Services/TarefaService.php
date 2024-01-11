<?php

namespace App\Services;

use App\Models\Tarefa;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;

class TarefaService
{
    private $tarefa;
    public function __construct(Tarefa $tarefa) {
        $this->tarefa = $tarefa;
    }

    public function index($search = null) {
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
                    'data_conclusao' => Carbon::now()->format('Y-m-d')
                ]);
            } else {
                $tarefa->update([
                    'realizada' => 0,
                    'data_conclusao' => null
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
