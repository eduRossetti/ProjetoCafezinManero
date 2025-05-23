@extends('base')
@section('titulo', 'Fornecedores')
@section('conteudo')

<div class="container mt-4">
    <h2 class="mb-4">Fornecedores</h2>

    <form method="post" action="{{ route('fornecedores.search') }}" class="row align-items-center g-2 mb-3">
        @csrf
        <div class="col-md-2">
            <select name="type" class="form-select">
                <option value="name">Nome</option>
                <option value="cpf">CPF</option>
                <option value="email">Email</option>
            </select>
        </div>

        <div class="col-md-5">
            <input type="text" name="value" class="form-control" placeholder="Buscar por nome, CPF ou email">
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Buscar</button>
        </div>

        <div class="col-md-3 text-end">
            <a href="{{ route('fornecedores.create') }}" class="btn btn-success w-100">Adicionar Novo Fornecedor</a>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Email</th>
                <th>UF</th>
                <th>Cidade</th>
                <th>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $fornecedores)
            <tr>
                <td>{{ $fornecedores->id }}</td>
                <td>{{ $fornecedores->name }}</td>
                <td>{{ $fornecedores->cnpj }}</td>
                <td>{{ $fornecedores->email }}</td>
                <td>{{ $fornecedores->uf }}</td>
                <td>{{ $fornecedores->cidade }}</td>
                <td>
                    <a href="{{ route('fornecedores.edit', $fornecedores->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('fornecedores.destroy', $fornecedores->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este fornecedor?')" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


</div>

@endsection