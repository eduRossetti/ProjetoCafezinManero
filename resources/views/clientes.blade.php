@extends('base')
@section('titulo', 'Clientes')
@section('conteudo')

<div class="container mt-4">
    <h2 class="mb-4">Clientes</h2>

    {{-- Display error message --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="GET" action="{{ route('clientes.search') }}" class="row mb-4">
        <div class="col-md-6">
            <input type="text" name="value" class="form-control" placeholder="Buscar por nome, CPF ou email">
        </div>
        <div class="col-md-4">
            <select name="type" class="form-select">
                <option value="name">Nome</option>
                <option value="cpf">CPF</option>
                <option value="email">Email</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>
    </form>

    {{-- Tabela de listagem --}}
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="6" class="text-center">Nenhum cliente encontrado.</td>
                </tr>
            @else
                @foreach ($data as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->name }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este cliente?')" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="text-end">
        <a href="{{ route('clientes.create') }}" class="btn btn-success">Adicionar Novo Cliente</a>
    </div>
</div>

@endsection
