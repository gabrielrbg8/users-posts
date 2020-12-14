@extends('layouts.app')

@section('title', 'Ações')

@section('content')

<div class="container">
    <div>
        <a class="btn btn-primary" href="{{ route('actions.create') }}">Nova ação</a>
    </div>
    <table class="table text-center">
        <thead class="bg-primary">
            <tr>
                <th class="profiles-table-head" scope='col'>#</th>
                <th class="profiles-table-head" scope='col'>Nome</th>
                <th class="profiles-table-head" scope='col'>Descrição</th>
                <th class="profiles-table-head" scope='col'>Ações</th>

            </tr>
        </thead>

        <tbody>
            @foreach($actions as $k => $action)
            <tr>
                <td>{{$action->id}}</td>
                <td>{{$action->name}}</td>
                <td>{{$action->description}}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{ route('actions.show', $action->id) }}">
                        <svg style="color:#007bff" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                            <circle cx="3.5" cy="5.5" r=".5" />
                            <circle cx="3.5" cy="8" r=".5" />
                            <circle cx="3.5" cy="10.5" r=".5" />
                        </svg>
                    </a>
                <form action="{{ route('actions.destroy' , $action->id)}}" method="POST">
                        <input name="_method" type="hidden" value="DELETE">
                        @csrf

                        <button type="submit" class="btn btn-delete-table">
                            <svg style="color: red;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                            </svg>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
