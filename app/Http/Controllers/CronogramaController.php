<?php

namespace App\Http\Controllers;

use App\Models\Cronograma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CronogramaController extends Controller
{
    private $cronograma;
    public function __construct(Cronograma $cronograma) {
        $this->cronograma = $cronograma;
    }

    public function index() { // MELHORAR E PASSAR PARA O SERVICE
        $query = $this->cronograma->where('user_id', auth()->user()->id)->get();
        $filtrado = [];
        $diasSemana = ['SEGUNDA', 'TERCA', 'QUARTA', 'QUINTA', 'SEXTA', 'SABADO', 'DOMINGO'];
        foreach($diasSemana as $diaSemana) {
            foreach($query as $atividade) {
                if($atividade->dia == $diaSemana) {
                    $filtrado[$atividade->dia][$atividade->id] = $atividade->titulo;
                }
            }
        }
        //dd(array_keys(array_values($filtrado['TERCA'])));
        $maxQtd = count($filtrado) > 0 ? count(max($filtrado)) : 0;
        return view('clientes.cronograma.index', compact('filtrado', 'maxQtd'));
    }

    public function create() {
        return view('clientes.cronograma.dados');
    }

    public function store(Request $request) {
        try {
            foreach ($request->dias as $dia) {
                $this->cronograma->create([
                    'user_id' => auth()->user()->id,
                    'titulo' => $request->titulo,
                    'dia' => $dia
                ]);
            }
            return redirect()->route('cronograma.index')->with('notificacao', ['tipo' => 'success', 'msg' => 'Atividade cadastrada com sucesso!']);
        } catch(\Exception $e) {
            //dd($e->getMessage());
            return redirect()->back()->with('notificacao', ['tipo' => 'danger', 'msg' => 'Ocorreu um erro ao cadastrar esta atividade...']);
        }
    }

    public function edit($id, Request $request) {
        $atividade = $this->cronograma->find($id);
        try {
            if(isset($request->dia)) {
                $atividade->update([
                    'titulo' => $request->titulo,
                    'dia' => $request->dia
                ]);
            } else {
                $atividade->update([
                    'titulo' => $request->titulo
                ]);
            }
            return redirect()->route('cronograma.index');
        } catch(Exception $e) {
            //dd($e->getMessage());
            return redirect()->back()->with('notificacao', ['tipo' => 'danger', 'msg' => 'Ocorreu um erro ao editar esta atividade...']);
        }
    }

    public function delete(Request $request) {
        try {
            $this->cronograma->find($request->id)->delete();
            return redirect()->route('cronograma.index');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            return redirect()->back()->with('notificacao', ['tipo' => 'danger', 'msg' => 'Ocorreu um erro ao deletar esta atividade...']);
        }
    }

    public function deleteAll() {
        try {
            $atividades = $this->cronograma->where('user_id', auth()->user()->id)->delete();
            return redirect()->route('cronograma.index')->with('msg', 'Todas as atividades foram removidas com sucesso!');
        } catch(\Exception $e) {
            //dd($e->getMessage());
            return redirect()->back()->with('notificacao', ['tipo' => 'danger', 'msg' => 'Ocorreu um erro ao deletar esta atividade...']);
        }
    }
}
