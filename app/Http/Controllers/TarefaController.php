<?php

namespace App\Http\Controllers;

use App\Http\Resources\TarefaResource;
use App\Models\Tarefa;
use App\Services\TarefaService;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    private $service;

    public function __construct(TarefaService $service) {
        $this->service = $service;
    }

    public function index(Request $request) {
        $service = $this->service->index();
        $tarefas = TarefaResource::collection($service);
        return view('clientes.tarefas.index', compact('tarefas'));
    }

    public function store(Request $request) {
        if(!isset($request->prazo)) {
            $input = $request->validate([
                'titulo' => 'string|required',
                'descricao' => 'string|required'
            ]);
        } else {
            $input = $request->validate([
                'titulo' => 'string|required',
                'prazo' => 'date|required',
                'descricao' => 'string|required'
            ]);
        }
        $service = $this->service->store($input);
        $msg = new TarefaResource($service);
        return redirect()->route('tarefas.index')->with('msg', $service);
    }

    public function concluirTarefa(Tarefa $tarefa) {
        return $this->service->concluirTarefa($tarefa);
    }

    public function delete(Request $request) {
        $this->service->delete($request->id);
        return redirect()->back()->with('msg', 'Tarefa Excluida com Sucesso!');
    }
}
