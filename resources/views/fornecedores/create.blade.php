@extends('base')
@section('titulo', 'Adicionar Fornecedor')
@section('conteudo')
<div class="container mt-4">
    <h2 class="mb-4">Adicionar Novo Fornecedor</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('fornecedores.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" class="form-control" id="cnpj"
                   value="{{ old('cnpj') }}" placeholder="Exemplo: 12.345.678/0001-99" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email"
                   value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="uf" class="form-label">UF</label>
            <input type="text" name="uf" class="form-control" id="uf"
                   value="{{ old('uf') }}" maxlength="2" placeholder="Ex: SP" required>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="cidade"
                   value="{{ old('cidade') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
