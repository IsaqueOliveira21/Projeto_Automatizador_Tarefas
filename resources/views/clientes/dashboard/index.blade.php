@extends('clientes.template')

@section('titulo', 'MINHAS ATIVIDADES')

@section('conteudo')
    @if(session('popup'))
        <div class="modal" id="modal-block-large" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-rounded block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Cyber Monday 2024!</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            <img src="{{ asset('assets/media/various/promo-test.jpg') }}" class="img-fluid" alt="">
                        </div>
                        <div class="block-content block-content-full text-end bg-body">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(isset($graficos['basicColumn']))
        <div class="content">
            <div class="block block-rounded mb-5">
                <div class="block-content">
                    <div id="graficoBasicColumns">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="content">
            <div class="block block-rounded mb-5">
                <div class="block-content text-center">
                    <h3>Nenhuma estatistica visivel...</h3>
                </div>
            </div>
        </div>
    @endif
    <script>
        // Use o evento 'shown.bs.modal' para abrir o modal quando a página estiver carregada
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('modal-block-large'));
            myModal.show();
        });
    </script>
@endsection
