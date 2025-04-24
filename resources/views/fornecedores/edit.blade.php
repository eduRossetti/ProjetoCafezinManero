@extends('base')
@section('titulo', 'Editar Fornecedor')
@section('conteudo')
<div class="container mt-4">
    <h2 class="mb-4">Editar Fornecedor</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('fornecedores.update', $fornecedor->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="{{ old('name', $fornecedor->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" class="form-control" id="cnpj"
                   value="{{ old('cnpj', $fornecedor->cnpj) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email"
                   value="{{ old('email', $fornecedor->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="uf" class="form-label">UF</label>
            <input type="text" name="uf" class="form-control" id="uf"
                   value="{{ old('uf', $fornecedor->uf) }}" maxlength="2" required>
        </div>

        <div class="mb-3">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="cidade"
                   value="{{ old('cidade', $fornecedor->cidade) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('fornecedores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
