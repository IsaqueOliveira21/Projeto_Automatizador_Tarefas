<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $graficos = [];
        // GRAFICO BASIC COLUMNS

        $query = DB::table('tarefas')
            ->selectRaw("CONCAT(MONTH(data_inicio), '/', YEAR(data_inicio)) AS mes_ano, realizada, COUNT(*) AS total")
            ->where('user_id', auth()->user()->id)
            ->groupBy('mes_ano', 'realizada')
            ->orderBy('data_inicio', 'DESC')
            ->limit(12)
            ->get();
        foreach ($query as $linha) {
            $graficos['basicColumn'][$linha->mes_ano] = ['0' => 0, '1' => 0];
        }
        foreach ($query as $linha) {
            $graficos['basicColumn'][$linha->mes_ano][$linha->realizada] = $linha->total;
        }
        if(isset($graficos['basicColumn'])) {
            $graficos['basicColumn'] = array_reverse($graficos['basicColumn']);
        }
        // END GRAFICO BASIC COLUMNS
        return view('clientes.dashboard.index', compact(['graficos']));
    }
}
