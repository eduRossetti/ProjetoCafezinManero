@extends('base')

@section('titulo', 'CafezinManeiro')

@section('conteudo')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Bem-vindo</h2>

    <div class="row">
        <!-- Card 1: Cafés -->
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Cafés</h5>
                    <a href="{{ route('coffee.index') }}" class="btn btn-primary">Ver Cafés</a>
                </div>
            </div>
        </div>

        <!-- Card 2: Fornecedores -->
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Fornecedores</h5>
                    <a href="{{ route('fornecedores.index') }}" class="btn btn-primary">Ver Fornecedores</a>
                </div>
            </div>
        </div>

        <!-- Card 3: Clientes -->
        <div class="col-md-4 mb-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Ver Clientes</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
