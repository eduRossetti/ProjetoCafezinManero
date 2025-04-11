@extends('base')
@section('titulo', 'BoinaLachas')
@section('conteudo')
<img src="{{ asset('img/image.png') }}" alt="" sizes="100vw" class="img-fluid mt-3"
    style="width: 100%; height: 100%; object-fit: cover;">
<form method="POST">
    @csrf
    <div class=" mt-4 card" style="background:#f5d0d0">
        <div class="card-header h3">
            Login
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Senha</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <input type="checkbox" class="form-check-input" id="remember_me">
                <label class="form-check-label" for="remember_me">Lembre de mim</label>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    <div class="text-center mt-3">
        <span>Novo? Faça seu cadastro <a href="#">aqui</a></span>
    </div>
</form>
@stop