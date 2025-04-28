@extends('base')
@section('titulo', 'Clientes')
@section('conteudo')

<div class="container mt-4">
    <h2 class="mb-4">Clientes</h2>

    <form method="post" action="{{ route('clientes.search') }}" class="row align-items-center g-2 mb-3">
        @csrf
        <div class="col-md-2">
            <select name="type" class="form-select">
                <option value="name">Nome</option>
                <option value="cpf">CPF</option>
                <option value="email">Email</option>
            </select>
        </div>

        <div class="col-md-5">
            <input type="text" name="value" class="form-control"
                placeholder="Buscar por nome, selo ou código de barras">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>

        <div class="col-md-3 text-end">
            <a href="{{ route('clientes.create') }}" class="btn btn-success w-100">Cadastrar Novo Cliente</a>
        </div>
    </form>
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
            @foreach ($data as $clientes)
            <tr>
                <td>{{ $clientes->id }}</td>
                <td>{{ $clientes->name }}</td>
                <td>{{ $clientes->cpf }}</td>
                <td>{{ $clientes->email }}</td>
                <td>{{ $clientes->telefone }}</td>
                <td>
                    <a href="{{ route('clientes.edit', $clientes->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('clientes.destroy', $clientes->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este cliente?')"
                            class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection