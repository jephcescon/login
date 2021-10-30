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
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{$usuario['name']}}" readonly>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$usuario['email']}}" readonly>
    </div>

    <div class="form-group">
        <label for="password">Criação</label>
        <input type="text" class="form-control" id="" placeholder="Criado em" value="{{date('d/m/Y h:i:s', strtotime($usuario['created_at']))}}" readonly>
    </div>

    <div class="form-group">
        <label for="password">Editado</label>
        <input type="text" class="form-control" id="" placeholder="Editado em" value="{{date('d/m/Y h:i:s', strtotime($usuario['updated_at']))}}" readonly>
    </div>

</form>
@endsection
