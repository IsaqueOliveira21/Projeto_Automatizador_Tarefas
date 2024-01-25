<?php

namespace App\Services;

use App\Mail\ConfirmEmail;
use App\Models\NotificacaoTarefa;
use App\Models\Tarefa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserService {

    public function login(array $input) {
        try {
            if(Auth::attempt($input)) {
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
                return redirect()->route('dashboard.index')->with('notificacao', true);
            } else {
                dd('Usuario ou senha invalidos');
            }
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }
    public function create(array $input) {
        try {
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => $input['password'],
            ]);
            Mail::to($user->email)->send(new ConfirmEmail([$user->id]));
            return redirect()->route('user.login')->with('confirmEmail', 'Uma mensagem de confirmação foi enviada para seu e-mail!');
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function update($input) {
        try {
            Auth::user()->update([
                'name' => $input['name']
            ]);
            return redirect()->back();
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }
}

?>
