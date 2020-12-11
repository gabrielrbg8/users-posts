@extends('layouts.app')

@section('title', 'Posts')

@section('content')

<div class="container">
    <div>
        <a class="btn btn-secondary" href="{{ route('posts.create') }}">Novo post</a>
    </div>
    <table class="table text-center">
        <thead class="bg-secondary">
            <tr>
                <th class="posts-table-head" scope='col'>#</th>
                <th class="posts-table-head" scope='col'>Title</th>
                <th class="posts-table-head" scope='col'>Subtitle</th>
                <th class="posts-table-head" scope='col'>Ações</th>
            </tr>
        </thead>

        <tbody>
            @foreach($posts as $k => $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->subtitle}}</td>
                <td>
                    <a href="{{ route('posts.show', $post->id) }}">
                        <svg style="color:#007bff" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                            <circle cx="3.5" cy="5.5" r=".5" />
                            <circle cx="3.5" cy="8" r=".5" />
                            <circle cx="3.5" cy="10.5" r=".5" />
                        </svg>
                    </a>

                    <a href="{{ route('posts.destroy', $post->id) }}">
                        <svg style="color: red;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
