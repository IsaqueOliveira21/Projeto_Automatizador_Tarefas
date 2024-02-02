@extends('clientes.template')

@section('titulo', 'MINHAS TAREFAS')

@section('conteudo')
    @if(session('msg'))
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <div class="flex-shrink-0">
                <i class="fa fa-fw fa-check"></i>
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="mb-0">{{ session('msg') }}</p>
            </div>
        </div>
    @endif
    <div class="block block-rounded">
        <ul class="nav nav-tabs nav-tabs-block" role="tablist">
            <li class="nav-item">
                <button class="nav-link active" id="btabs-animated-slideup-home-tab" data-bs-toggle="tab"
                        data-bs-target="#btabs-animated-slideup-home" role="tab"
                        aria-controls="btabs-animated-slideup-home" aria-selected="true">Pendentes
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" id="btabs-animated-slideup-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#btabs-animated-slideup-profile" role="tab"
                        aria-controls="btabs-animated-slideup-profile" aria-selected="false">Concluídas
                </button>
            </li>
        </ul>
        <div class="block-content tab-content overflow-hidden">
            <div class="tab-pane fade fade-up show active" id="btabs-animated-slideup-home" role="tabpanel"
                 aria-labelledby="btabs-animated-slideup-home-tab">
                <div class="js-task-list">
                    @if(count($tarefas->where('realizada', 0)) == 0)
                        <h5 class="text-center mt-0 mb-0">Nenhuma tarefa aqui...</h5>
                    @else
                        @foreach($tarefas as $tarefa)
                            @if($tarefa->realizada == 0)
                                <div class="js-task block block-rounded block-fx-pop block-fx-pop mb-2 animated fadeIn {{ isset($tarefa->data_conclusao) && \Carbon\Carbon::now()->format('Y-m-d') > $tarefa->data_conclusao ? 'bg-danger-light' : (\Carbon\Carbon::now()->format('Y-m-d') == $tarefa->data_conclusao ? 'bg-warning-light' : '' ) }}"
                                     data-task-id="9" data-task-completed="false" data-task-starred="false">
                                    <table class="table table-borderless table-vcenter mb-0">
                                        <tr>
                                            <td class="text-center pe-0" style="width: 38px;">
                                                <div class="js-task-status form-check">
                                                    <a href="{{ Route('tarefas.concluir', $tarefa->id) }}"
                                                       class="btn btn-success" role="button">
                                                        <i class="fa fa-check-circle"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="js-task-content fw-semibold col-12">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalDetalhesTarefa"
                                                   data-item="
                                                   <h4>{{ $tarefa->titulo }} ({{ \Carbon\Carbon::createFromFormat('Y-m-d', $tarefa->data_inicio)->format('d/m/Y') }})</h4>
                                                   <br>
                                                   <h6>Descrição:</h6>
                                                   <p>{{ $tarefa->descricao }}</p>
                                                   @if(isset($tarefa->data_conclusao))
                                                      <h6 class='text-{{\Carbon\Carbon::now()->format('Y-m-d') > $tarefa->data_conclusao ? 'danger' : (\Carbon\Carbon::now()->format('Y-m-d') == $tarefa->data_conclusao ? 'warning' : 'primary' )}}'>
                                                        @if(\Carbon\Carbon::now()->format('Y-m-d') > $tarefa->data_conclusao)
                                                            {{ '<i class="fa fa-1x fa-exclamation-triangle"></i>' }}
                                                        @elseif(\Carbon\Carbon::now()->format('Y-m-d') == $tarefa->data_conclusao)
                                                            {{ '<i class="fa fa-1x fa-clock"></i>' }}
                                                        @endif
                                                         Prazo: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $tarefa->data_conclusao)->format('d/m/Y') }}
                                                      </h6>
                                                   @endif
                                                   ">
                                                    {{ $tarefa->titulo }}
                                                </a>
                                            </td>
                                            <td class="text-end" style="width: 100px;">
                                                <a class="js-task-remove btn btn-sm btn-link text-danger"
                                                   data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                   data-id="{{ $tarefa->id }}"
                                                   data-item="Deseja realmente excluir a tarefa: <b>{{ $tarefa->titulo }}</b>?"
                                                   data-url="delete" data-title="Remover Tarefa" title="Remover Tarefa">
                                                    <i class="fa fa-times fa-fw"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-pane fade fade-up" id="btabs-animated-slideup-profile" role="tabpanel"
                 aria-labelledby="btabs-animated-slideup-profile-tab">
                <div class="js-task-list">
                    @if(count($tarefas->where('realizada', 1)) == 0)
                        <h5 class="text-center mt-0 mb-0">Nenhuma tarefa aqui...</h5>
                    @else
                        @foreach($tarefas as $tarefa)
                            @if($tarefa->realizada == 1)
                                <div class="js-task block block-rounded block-fx-pop block-fx-pop mb-2 animated fadeIn"
                                     data-task-id="9" data-task-completed="false" data-task-starred="false">
                                    <table class="table table-borderless table-vcenter mb-0">
                                        <tr>
                                            <td class="text-center pe-0" style="width: 38px;">
                                                <div class="js-task-status form-check">
                                                    <a href="{{ Route('tarefas.concluir', $tarefa->id) }}"
                                                       class="btn btn-warning" role="button">
                                                        <i class="fa fa-undo"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="js-task-content fw-semibold">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalDetalhesTarefa"
                                                   data-item="
                                                   <h4>{{ $tarefa->titulo }} ({{ \Carbon\Carbon::createFromFormat('Y-m-d', $tarefa->data_inicio)->format('d/m/Y') }})</h4>
                                                   <br>
                                                   <h6>Descrição:</h6>
                                                   <p>{{ $tarefa->descricao }}</p>
                                                   ">
                                                    {{ $tarefa->titulo }}
                                                </a>
                                            </td>
                                            <td class="text-end" style="width: 100px;">
                                                <a class="js-task-remove btn btn-sm btn-link text-danger"
                                                   data-bs-toggle="modal" data-bs-target="#modalDelete"
                                                   data-id="{{ $tarefa->id }}"
                                                   data-item="Deseja realmente excluir a tarefa: <b>{{ $tarefa->titulo }}</b>?"
                                                   data-url="delete" data-title="Remover Tarefa" title="Remover Tarefa">
                                                    <i class="fa fa-times fa-fw"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
