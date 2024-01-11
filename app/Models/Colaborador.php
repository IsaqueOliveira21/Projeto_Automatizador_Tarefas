<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaboradores';

    protected $fillable = [
        'user_id',
        'cargo',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
