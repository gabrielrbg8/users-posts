@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="container">

    <div>
        @if(Auth::user()->isAdmin())
        <a class="btn btn-primary" href="{{ route('users.index') }}">Usuários</a>
        @endif
        <a class="btn btn-secondary" href="{{ route('users.edit', $user->id) }}">Editar</a>
    </div>

    <table class="table text-center">
        <thead class="bg-primary">
            <tr>
                <th class="users-table-head" scope='col'>#</th>
                <th class="users-table-head" scope='col'>Detalhes</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>ID</td>
                <td>{{$user->id}}</td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <td>E-mail</td>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <td>Posts</td>
                <td>{{ count($user->posts) }}</td>
            </tr>
            <tr>
                <td>Arquivos</td>
                <td>{{ count($user->archives()) }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
