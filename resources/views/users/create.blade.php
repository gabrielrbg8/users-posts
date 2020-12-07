@extends('layouts.app')

@section('title', 'Criar Usuário')

@section('content')
<div class="w-75 container d-flex justify-content-center flex-column">

    <form method="post" action="{{ route('users.store') }}" class="form-create-user d-flex justify-content-center">
        @csrf
        <div class="form-group d-flex flex-column justify-content-center">
            <label for="name">Nome</label>
            <input class="form-control" name="name" type="text" placeholder="Nome">
        </div>

        <div class="form-group d-flex flex-column justify-content-center">
            <label for="name">Email</label>
            <input class="form-control" name="email" type="text" placeholder="E-mail">
        </div>

        <div class="form-group d-flex flex-column justify-content-center">
            <label for="name">Senha</label>
            <input class="form-control" name="password" type="text" placeholder="Senha">
        </div>

        <button class="btn btn-primary" type="submit" [disabled]="!form.form.valid">
            Salvar
        </button>
    </form>
</div>
@endsection
