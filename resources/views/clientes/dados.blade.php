@extends('clientes.template')

@section('titulo', 'Suas Informações')

@section('conteudo')
    <div class="row">
        <div class="col-lg-12 col-xl-12">
            <!-- Form Labels on top - Default Style -->
            <form class="mb-5" action="{{ Route('user.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="form-label" for="example-ltf-email">Nome</label>
                    <input type="text" class="form-control" id="example-ltf-username" name="name" value="{{ $user->name }}">
                </div>
                <div class="input-group mb-4">
                    <input type="email" class="form-control" id="example-group3-input1" name="email" value="{{ $user->email }}" disabled>
                    <button type="button" class="btn btn-primary">Trocar?</button>
                </div>
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
