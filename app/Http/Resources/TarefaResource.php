<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TarefaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => (integer) $this->id,
            'titulo' => (string) $this->titulo,
            'descricao' => (string) $this->descricao,
            'data_inicio' => (string) $this->data_inicio,
            'data_conclusao' => (string) $this->data_conclusao
        ];
    }
}
