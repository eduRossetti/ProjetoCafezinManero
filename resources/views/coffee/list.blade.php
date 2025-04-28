@extends('base')

@section('titulo', 'Grãos de Café')

@section('conteudo')

<div class="container mt-4">
    <h2 class="mb-4">Grãos de Café</h2>

    <form method="post" action="{{ route('coffee.search') }}" class="row align-items-center g-2 mb-3">
        @csrf
        <div class="col-md-2">
            <select name="type" class="form-select">
                <option value="name">Nome</option>
                <option value="seal">Selo</option>
                <option value="barcode">Código de Barras</option>
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
            <a href="{{ route('coffee.create') }}" class="btn btn-success w-100">Adicionar Novo Café</a>
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Selo</th>
                <th>Fornecedor</th>
                <th>Código de Barras</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $coffee)
            <tr>
                <td>{{ $coffee->id }}</td>
                <td>{{ $coffee->name }}</td>
                <td>{{ $coffee->seal }}</td>
                <td>{{ $coffee->fornecedor->name ?? 'N/A' }}</td>
                <td>{{ $coffee->barcode }}</td>
                <td>R$ {{ number_format($coffee->price, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('coffee.edit', $coffee->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('coffee.destroy', $coffee->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este café?')"
                            class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection