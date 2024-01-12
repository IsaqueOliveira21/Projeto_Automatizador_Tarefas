@extends('clientes.template')

@section('titulo', 'MINHAS ATIVIDADES')

@section('conteudo')
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
@endsection
