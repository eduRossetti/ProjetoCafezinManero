@extends('base')

@section('titulo', isset($coffee) ? 'Editar Café' : 'Adicionar Café')

@section('conteudo')
<div class="container mt-4">
    <h2 class="mb-4">{{ isset($coffee) ? 'Editar Café' : 'Adicionar Novo Café' }}</h2>

    {{-- Exibição de erros de validação --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ isset($coffee) ? route('coffee.update', $coffee->id) : route('coffee.store') }}">
        @csrf
        @if (isset($coffee))
        @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $coffee->name ?? '') }}"
                required>
        </div>

        <div class="mb-3">
            <label for="seal" class="form-label">Selo</label>
            <select name="seal" class="form-select" required>
                <option value="">Selecione um selo</option>
                <option value="Extraforte" {{ old('seal', $coffee->seal ?? '') == 'Extraforte' ? 'selected' : '' }}>Extraforte</option>
                <option value="Tradicional" {{ old('seal', $coffee->seal ?? '') == 'Tradicional' ? 'selected' : '' }}>Tradicional</option>
                <option value="Gourmet" {{ old('seal', $coffee->seal ?? '') == 'Gourmet' ? 'selected' : '' }}>Gourmet</option>
                <option value="Superior" {{ old('seal', $coffee->seal ?? '') == 'Superior' ? 'selected' : '' }}>Superior</option>
                <option value="Especial" {{ old('seal', $coffee->seal ?? '') == 'Especial' ? 'selected' : '' }}>Especial</option>
            </select>
        </div>


        <div class="mb-3">
            <label for="fornecedores_id" class="form-label">Fornecedor</label>
            <select name="fornecedores_id" class="form-select" required>
                <option value="">Selecione um fornecedor</option>
                @foreach ($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}"
                    {{ old('fornecedores_id', $coffee->fornecedores_id ?? '') == $fornecedor->id ? 'selected' : '' }}>
                    {{ $fornecedor->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="barcode" class="form-label">Código de Barras</label>
            <input type="text" name="barcode" class="form-control" id="barcode"
                value="{{ old('barcode', $coffee->barcode ?? '') }}" placeholder="123456789012" required>
        </div>


        <div class="mb-3">
            <label for="price" class="form-label">Preço</label>
            <input type="number" step="0.01" name="price" class="form-control" id="price"
                value="{{ old('price', $coffee->price ?? '') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($coffee) ? 'Atualizar' : 'Salvar' }}
        </button>

        <a href="{{ route('coffee.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection