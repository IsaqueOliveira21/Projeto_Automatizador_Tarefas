<?php

namespace App\Services;

use App\Mail\ConfirmEmail;
use App\Models\NotificacaoTarefa;
use App\Models\Tarefa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserService
{

    public function login(array $input)
    {
        if (Auth::attempt($input)) {
            $notificacoesIds = [];
            $notificacoes = DB::table('notificacoes_tarefas')
                ->join('tarefas', 'notificacoes_tarefas.tarefa_id', '=', 'tarefas.id')
                ->selectRaw('notificacoes_tarefas.id, tarefas.id AS tarefa_id, notificacoes_tarefas.visualizado, notificacoes_tarefas.deleted_at AS removido_em, tarefas.titulo')
                ->where('notificacoes_tarefas.user_id', auth()->user()->id)
                ->where('tarefas.realizada', 0)
                ->orderBy('notificacoes_tarefas.id', 'DESC')
                ->get();
            foreach ($notificacoes as $notificacao) {
                $notificacoesIds[] = $notificacao->tarefa_id;
            }
            $tarefas = Tarefa::where('user_id', auth()->user()->id)
                ->where('realizada', 0)
                ->whereNotNull('data_conclusao')
                ->get();
            foreach ($tarefas as $tarefa) {
                if (!in_array($tarefa->id, $notificacoesIds)) {
                    if (Carbon::now()->format('Y-m-d') > $tarefa->data_conclusao) {
                        NotificacaoTarefa::create([
                            'user_id' => auth()->user()->id,
                            'tarefa_id' => $tarefa->id,
                        ]);
                    }
                }
            }
            return redirect()->route('dashboard.index')->with('popup', true);
        } else {
            return redirect()->back()->with('error', 'E-mail ou senha incorreto!');
        }
    }

    public function create(array $input)
    {
        try {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
            ]);
            Mail::to($user->email)->send(new ConfirmEmail([$user->id]));
            return redirect()->route('user.login')->with('msg', 'Uma mensagem de confirmação foi enviada para seu e-mail!');
        } catch (Exception $e) {
            //dd($e->getMessage());
            return redirect()->route('user.login')->with('error', 'Ocorreu um erro ao realizar o cadastro...');
        }
    }

    public function update($input)
    {
        try {
            Auth::user()->update([
                'name' => $input['name']
            ]);
            return redirect()->back()->with('notificacao', ['tipo' => 'success', 'msg' => 'Perfil atualizado com sucesso!']);
        } catch (Exception $e) {
            //dd($e->getMessage());
            return redirect()->back()->with('notificacao', ['tipo' => 'danger', 'msg' => 'Ocorreu um erro ao atualizar seu perfil...']);
        }
    }
}

?>
