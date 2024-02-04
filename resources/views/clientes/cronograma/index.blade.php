@extends('clientes.template')
@section('titulo', 'CRONOGRAMA')

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
        <div class="block-content">
            @if($maxQtd > 0 )
                <div class="container text-end mb-4">
                    <div class="row">
                        <div class="col-12">
                            <a href="#" class="btn btn-alt-danger" role="button"
                               data-bs-toggle="modal" data-bs-target="#modalDelete"
                               data-item="Deseja realmente apagar todas as atividades?"
                               data-url="deleteAll" data-title="Remover todas as atividades">
                                <i class="far fa-1x fa-trash-alt"></i>
                                Apagar Tudo
                            </a>
                        </div>
                    </div>
                </div>
            @endif
            <div class="table-responsive">
            <table class="table table-striped table-vcenter">
                <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">SEGUNDA</th>
                    <th class="text-center" style="width: 50px;">TERÇA</th>
                    <th class="text-center" style="width: 50px;">QUARTA</th>
                    <th class="text-center" style="width: 50px;">QUINTA</th>
                    <th class="text-center" style="width: 50px;">SEXTA</th>
                    <th class="text-center" style="width: 50px;">SABADO</th>
                    <th class="text-center" style="width: 50px;">DOMINGO</th>
                </tr>
                </thead>
                <tbody>
                @if($maxQtd > 0)
                    @for($i = 0; $i < $maxQtd; $i++)
                        <tr class="text-center">
                            <td>
                                <a href="#"
                                   @if(isset($filtrado['SEGUNDA']) && isset(array_values(array_keys($filtrado['SEGUNDA']))[$i]))
                                        data-bs-toggle="modal" data-bs-target="#modalDadosCronograma"
                                        data-id="{{ array_values(array_keys($filtrado['SEGUNDA']))[$i] }}"
                                        data-item='
                                        <form id="formEditarAtividade" action="{{ Route('cronograma.edit', array_values(array_keys($filtrado['SEGUNDA']))[$i]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" id="example-text-input" name="titulo" value="{{ array_values(array_values($filtrado['SEGUNDA']))[$i] }}">
                                            <div class="mb-4">
                                              <label class="form-label mt-4" for="example-select">Dia:</label>
                                              <select class="form-select" id="example-select" name="dia">
                                                <option value="">ESCOLHA UM DIA</option>
                                                <option value="SEGUNDA" selected>SEGUNDA</option>
                                                <option value="TERCA">TERÇA</option>
                                                <option value="QUARTA">QUARTA</option>
                                                <option value="QUINTA">QUINTA</option>
                                                <option value="SEXTA">SEXTA</option>
                                                <option value="SABADO">SABADO</option>
                                                <option value="DOMINGO">DOMINGO</option>
                                              </select>
                                            </div>
                                        </form>'
                                   data-delete="delete" title="Ver Atividade"
                                    @endif>
                                    {{ isset($filtrado['SEGUNDA']) ? array_values(array_values($filtrado['SEGUNDA']))[$i] ?? ' - ' : ' - '}}
                                </a>
                            </td>
                            <td>
                                <a href="#"
                                   @if(isset($filtrado['TERCA']) && isset(array_values(array_keys($filtrado['TERCA']))[$i]))
                                       data-bs-toggle="modal" data-bs-target="#modalDadosCronograma"
                                   data-id="{{ array_values(array_keys($filtrado['TERCA']))[$i] }}"
                                   data-item='
                                        <form id="formEditarAtividade" action="{{ Route('cronograma.edit', array_values(array_keys($filtrado['TERCA']))[$i]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" id="example-text-input" name="titulo" value="{{ array_values(array_values($filtrado['TERCA']))[$i] }}">
                                            <div class="mb-4">
                                              <label class="form-label mt-4" for="example-select">Dia:</label>
                                              <select class="form-select" id="example-select" name="dia">
                                                <option value="">ESCOLHA UM DIA</option>
                                                <option value="SEGUNDA">SEGUNDA</option>
                                                <option value="TERCA" selected>TERÇA</option>
                                                <option value="QUARTA">QUARTA</option>
                                                <option value="QUINTA">QUINTA</option>
                                                <option value="SEXTA">SEXTA</option>
                                                <option value="SABADO">SABADO</option>
                                                <option value="DOMINGO">DOMINGO</option>
                                              </select>
                                            </div>
                                        </form>'
                                   data-delete="delete" title="Ver Atividade"
                                    @endif>
                                    {{ isset($filtrado['TERCA']) ? array_values(array_values($filtrado['TERCA']))[$i] ?? ' - ' : ' - '}}
                                </a>
                            </td>
                            <td>
                                <a href="#"
                                   @if(isset($filtrado['QUARTA']) && isset(array_values(array_keys($filtrado['QUARTA']))[$i]))
                                       data-bs-toggle="modal" data-bs-target="#modalDadosCronograma"
                                   data-id="{{ array_values(array_keys($filtrado['QUARTA']))[$i] }}"
                                   data-item='
                                        <form id="formEditarAtividade" action="{{ Route('cronograma.edit', array_values(array_keys($filtrado['QUARTA']))[$i]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" id="example-text-input" name="titulo" value="{{ array_values(array_values($filtrado['QUARTA']))[$i] }}">
                                            <div class="mb-4">
                                              <label class="form-label mt-4" for="example-select">Dia:</label>
                                              <select class="form-select" id="example-select" name="dia">
                                                <option value="">ESCOLHA UM DIA</option>
                                                <option value="SEGUNDA">SEGUNDA</option>
                                                <option value="TERCA">TERÇA</option>
                                                <option value="QUARTA" selected>QUARTA</option>
                                                <option value="QUINTA">QUINTA</option>
                                                <option value="SEXTA">SEXTA</option>
                                                <option value="SABADO">SABADO</option>
                                                <option value="DOMINGO">DOMINGO</option>
                                              </select>
                                            </div>
                                        </form>'
                                   data-delete="delete" title="Ver Atividade"
                                    @endif>
                                    {{ isset($filtrado['QUARTA']) ? array_values(array_values($filtrado['QUARTA']))[$i] ?? ' - ' : ' - '}}
                                </a>
                            </td>
                            <td>
                                <a href="#"
                                   @if(isset($filtrado['QUINTA']) && isset(array_values(array_keys($filtrado['QUINTA']))[$i]))
                                       data-bs-toggle="modal" data-bs-target="#modalDadosCronograma"
                                   data-id="{{ array_values(array_keys($filtrado['QUINTA']))[$i] }}"
                                   data-item='
                                        <form id="formEditarAtividade" action="{{ Route('cronograma.edit', array_values(array_keys($filtrado['QUINTA']))[$i]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" id="example-text-input" name="titulo" value="{{ array_values(array_values($filtrado['QUINTA']))[$i] }}">
                                            <div class="mb-4">
                                              <label class="form-label mt-4" for="example-select">Dia:</label>
                                              <select class="form-select" id="example-select" name="dia">
                                                <option value="">ESCOLHA UM DIA</option>
                                                <option value="SEGUNDA">SEGUNDA</option>
                                                <option value="TERCA">TERÇA</option>
                                                <option value="QUARTA">QUARTA</option>
                                                <option value="QUINTA" selected>QUINTA</option>
                                                <option value="SEXTA">SEXTA</option>
                                                <option value="SABADO">SABADO</option>
                                                <option value="DOMINGO">DOMINGO</option>
                                              </select>
                                            </div>
                                        </form>'
                                   data-delete="delete" title="Ver Atividade"
                                    @endif>
                                    {{ isset($filtrado['QUINTA']) ? array_values(array_values($filtrado['QUINTA']))[$i] ?? ' - ' : ' - '}}
                                </a>
                            </td>
                            <td>
                                <a href="#"
                                   @if(isset($filtrado['SEXTA']) && isset(array_values(array_keys($filtrado['SEXTA']))[$i]))
                                       data-bs-toggle="modal" data-bs-target="#modalDadosCronograma"
                                   data-id="{{ array_values(array_keys($filtrado['SEXTA']))[$i] }}"
                                   data-item='
                                        <form id="formEditarAtividade" action="{{ Route('cronograma.edit', array_values(array_keys($filtrado['SEXTA']))[$i]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" id="example-text-input" name="titulo" value="{{ array_values(array_values($filtrado['SEXTA']))[$i] }}">
                                            <div class="mb-4">
                                              <label class="form-label mt-4" for="example-select">Dia:</label>
                                              <select class="form-select" id="example-select" name="dia">
                                                <option value="">ESCOLHA UM DIA</option>
                                                <option value="SEGUNDA">SEGUNDA</option>
                                                <option value="TERCA">TERÇA</option>
                                                <option value="QUARTA">QUARTA</option>
                                                <option value="QUINTA">QUINTA</option>
                                                <option value="SEXTA" selected>SEXTA</option>
                                                <option value="SABADO">SABADO</option>
                                                <option value="DOMINGO">DOMINGO</option>
                                              </select>
                                            </div>
                                        </form>'
                                   data-delete="delete" title="Ver Atividade"
                                    @endif>
                                    {{ isset($filtrado['SEXTA']) ? array_values(array_values($filtrado['SEXTA']))[$i] ?? ' - ' : ' - '}}
                                </a>
                            </td>
                            <td>
                                <a href="#"
                                   @if(isset($filtrado['SABADO']) && isset(array_values(array_keys($filtrado['SABADO']))[$i]))
                                       data-bs-toggle="modal" data-bs-target="#modalDadosCronograma"
                                   data-id="{{ array_values(array_keys($filtrado['SABADO']))[$i] }}"
                                   data-item='
                                        <form id="formEditarAtividade" action="{{ Route('cronograma.edit', array_values(array_keys($filtrado['SABADO']))[$i]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" id="example-text-input" name="titulo" value="{{ array_values(array_values($filtrado['SABADO']))[$i] }}">
                                            <div class="mb-4">
                                              <label class="form-label mt-4" for="example-select">Dia:</label>
                                              <select class="form-select" id="example-select" name="dia">
                                                <option value="">ESCOLHA UM DIA</option>
                                                <option value="SEGUNDA">SEGUNDA</option>
                                                <option value="TERCA">TERÇA</option>
                                                <option value="QUARTA">QUARTA</option>
                                                <option value="QUINTA">QUINTA</option>
                                                <option value="SEXTA">SEXTA</option>
                                                <option value="SABADO" selected>SABADO</option>
                                                <option value="DOMINGO">DOMINGO</option>
                                              </select>
                                            </div>
                                        </form>'
                                   data-delete="delete" title="Ver Atividade"
                                    @endif>
                                    {{ isset($filtrado['SABADO']) ? array_values(array_values($filtrado['SABADO']))[$i] ?? ' - ' : ' - '}}
                                </a>
                            </td>
                            <td>
                                <a href="#"
                                   @if(isset($filtrado['DOMINGO']) && isset(array_values(array_keys($filtrado['DOMINGO']))[$i]))
                                       data-bs-toggle="modal" data-bs-target="#modalDadosCronograma"
                                   data-id="{{ array_values(array_keys($filtrado['DOMINGO']))[$i] }}"
                                   data-item='
                                        <form id="formEditarAtividade" action="{{ Route('cronograma.edit', array_values(array_keys($filtrado['DOMINGO']))[$i]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" class="form-control" id="example-text-input" name="titulo" value="{{ array_values(array_values($filtrado['DOMINGO']))[$i] }}">
                                            <div class="mb-4">
                                              <label class="form-label mt-4" for="example-select">Dia:</label>
                                              <select class="form-select" id="example-select" name="dia">
                                                <option value="">ESCOLHA UM DIA</option>
                                                <option value="SEGUNDA">SEGUNDA</option>
                                                <option value="TERCA">TERÇA</option>
                                                <option value="QUARTA">QUARTA</option>
                                                <option value="QUINTA">QUINTA</option>
                                                <option value="SEXTA">SEXTA</option>
                                                <option value="SABADO">SABADO</option>
                                                <option value="DOMINGO" selected>DOMINGO</option>
                                              </select>
                                            </div>
                                        </form>'
                                   data-delete="delete" title="Ver Atividade"
                                    @endif>
                                    {{ isset($filtrado['DOMINGO']) ? array_values(array_values($filtrado['DOMINGO']))[$i] ?? ' - ' : ' - '}}
                                </a>
                            </td>
                        </tr>
                    @endfor
                @else
                    <tr class="text-center">
                        <td colspan="7">Nenhuma atividade ainda...</td>
                    </tr>
                @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="7" class="bg-black-5 text-center text-primary-light">
                            <i class="fa fa-1x fa-info-circle"></i>
                            Para editar ou excluir uma atividade, basta clicar no titulo desejado.
                        </td>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
@endsection
