@extends('layout')

@section('conteudo')
<a href="/" class="btn btn-dark mb-2 mt-5">Voltar</a>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" class="mt-5">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="form-group mt-1">
        <label for="name">Nome</label>
        <input type="name" class="form-control" id="name" name="name" placeholder="Nome">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Senha">
    </div>

    <button type="submit" class="btn btn-success">Salvar</button>
</form>
@endsection
