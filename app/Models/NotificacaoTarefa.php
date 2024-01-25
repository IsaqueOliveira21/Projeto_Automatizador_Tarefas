<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificacaoTarefa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "notificacoes_tarefas";

    protected $fillable = [
        'user_id',
        'tarefa_id',
        'visualizado'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function tarefa() {
        return $this->belongsTo(Tarefa::class);
    }
}
