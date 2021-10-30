@extends('layout')

@section('conteudo')
<div class="table-responsive">

    <a href="{{route('criar')}}" class="btn btn-dark mb-2 mt-5">Adicionar</a>

    @if(!empty($mensagem))
    <div class="alert alert-success">
        {{$mensagem}}
    </div>
    @endif

    <table class="table table-bordered mt-1">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Usuário</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $usuario): ?>
                <tr>
                    <th scope="row"><?=$usuario['id'];?></th>
                    <td><?=$usuario['name'];?></td>
                    <td><?=$usuario['email'];?></td>
                    <td><?=$usuario['email'];?></td>
                    <td>
                        <a href="{{ route("visualizar", "{$usuario->id}")}}" class="btn btn-info btn-sm">Visualizar</a>
                        <a href="{{ route("editar", "{$usuario->id}")}}" class="btn btn-warning btn-sm">Editar</a>
                        <form method="post" action="/remover/<?=$usuario['id'];?>"
                            onsubmit="return confirm('Tem certeza que deseja excluir o usuario {{addslashes($usuario['name'])}}?')">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Excluir</button>
                        </form>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
@endsection
