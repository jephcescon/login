@extends('layout')

@section('conteudo')



@if($errors->any())
<div class="alert alert-danger mt-5">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container-fluid ps-md-0">
<div class="row g-0">
    <div class="col-md-12 col-lg-12">
        <div class="login d-flex align-items-center py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-lg-8 mx-auto">
                        <h3 class="login-heading mb-4">Autenticação</h3>
                        <!-- Sign In Form -->
                        <form method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="email" name="email" class="form-control" id="floatingInput" placeholder="seu@email.com" required>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="sua senha">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn-primary btn-login fw-bold mb-2 btn-sm" type="submit">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
