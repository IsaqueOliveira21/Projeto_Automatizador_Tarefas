@extends('clientes.template')

@section('titulo', 'NOTIFICAÇÕES')

@section('conteudo')
    @if($notificacoesQtd > 0)
        @foreach($notificacoes as $notificacao)
            @if($notificacao->visualizado == 0)
                <div class="col-md-12">
                    <div class="block block-themed">
                        <div class="block-header bg-gd-fruit">
                            <i class="fa fa-bell" style="margin-right: 7px"></i>
                            <h3 class="block-title">Tarefa: <b>{{ $notificacao->titulo }}</b> está em atraso!</h3>
                            <div class="block-options">
                                <a href="{{ route('notificacoes.visualizar', $notificacao->id) }}" class="btn btn-block-option" role="button">
                                    <i class="fa fa-check-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($notificacao->visualizado == 1 && is_null($notificacao->removido_em))
                <div class="col-md-12">
                    <div class="block block-themed">
                        <div class="block-header bg-gray">
                            <h3 class="block-title">Tarefa: <b>{{ $notificacao->titulo }}</b> está em atraso!</h3>
                            <div class="block-options">
                                <a href="{{ route('notificacoes.delete', $notificacao->id) }}" role="button" class="btn-block-option">
                                    <i class="fa fa-times-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        <div class="content">
            <div class="block block-rounded mb-5">
                <div class="block-content text-center">
                    <h3>Nenhuma notificação ainda...</h3>
                </div>
            </div>
        </div>
    @endif
@endsection
