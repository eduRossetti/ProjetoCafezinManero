@extends('base')
@section('titulo', 'Adicionar Cliente')
@section('conteudo')
<div class="container mt-4">
    <h2 class="mb-4">Adicionar Novo Cliente</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('clientes.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name"
                   value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" id="cpf"
                   value="{{ old('cpf') }}" placeholder="Exemplo: 123.456.789-00" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" class="form-control" id="email"
                   value="{{ old('email') }}" placeholder="Exemplo: cliente@email.com" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" id="telefone"
                   value="{{ old('telefone') }}" placeholder="Exemplo: (11) 91234-5678" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
