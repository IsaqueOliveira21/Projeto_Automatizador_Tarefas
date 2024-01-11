@extends('clientes.template')

@section('titulo', 'Cadastrar Atividade - Cronograma')

@section('conteudo')
    <form action="{{ Route('cronograma.store') }}" method="POST" enctype="application/x-www-form-urlencoded">
        @csrf
        <div class="mb-4">
            <label class="form-label" for="example-text-input">Atividade</label>
            <input type="text" class="form-control" id="example-text-input" name="titulo" placeholder="Nome da atividade">
        </div>
        <label for="dias-semana">Selecione os dias:</label>
        <div class="container dias-semana text-center mb-4" id="dias-semana">
            <input type="checkbox" id="checkboxS" name="dias[]" class="custom-checkbox" value="SEGUNDA">
            <label for="checkboxS">S</label>
            <input type="checkbox" id="checkboxT" name="dias[]" class="custom-checkbox" value="TERCA">
            <label for="checkboxT">T</label>
            <input type="checkbox" id="checkboxQ" name="dias[]" class="custom-checkbox" value="QUARTA">
            <label for="checkboxQ">Q</label>
            <input type="checkbox" id="checkboxQ2" name="dias[]" class="custom-checkbox" value="QUINTA">
            <label for="checkboxQ2">Q</label>
            <input type="checkbox" id="checkboxS2" name="dias[]" class="custom-checkbox" value="SEXTA">
            <label for="checkboxS2">S</label>
            <input type="checkbox" id="checkboxS3" name="dias[]" class="custom-checkbox" value="SABADO">
            <label for="checkboxS3">S</label>
            <input type="checkbox" id="checkboxD" name="dias[]" class="custom-checkbox" value="DOMINGO">
            <label for="checkboxD">D</label>
        </div>
        <button class="btn btn-primary mb-4" type="submit">Criar</button>
    </form>
@endsection
