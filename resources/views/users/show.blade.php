@extends('layouts.app')

@section('title', $user->name)

@section('content')

<div class="container">

    <div>
        <a href="{{ route('users.index') }}">Home</a>
    </div>

    <div class="container-user d-flex justify-content-between">
        <div class="">
            <h4>NOME</h4>
            <h5>{{ $user->name }}</h5>
        </div>
        <div class="">
            <h4>EMAIL</h4>
            <h5>{{ $user->email }}</h5>
        </div>
    </div>
    <br>
    <div>
        <h4>POSTS</h4>
        @foreach($user->posts as $post)

        <div id="accordion">
            <div class="card card-posts">
                <div class="card-header d-flex justify-content-between" id="heading{{ $post->id }}">
                    <button class="btn btn-link text-left" data-toggle="collapse" data-target="#collapse{{$post->id}}" aria-expanded="true" aria-controls="collapseOne">
                        <h5 class="user-post-title">{{$post->title}}</h5>
                        <p class="user-post-subtitle">{{ $post->subtitle }}</p>
                    </button>
                    <a id="btnDownload" class="user-post-download">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                        </svg>
                    </a>
                </div>

                <div id="collapse{{$post->id}}" class="collapse" aria-labelledby="heading{{ $post->id }}" data-parent="#accordion">
                    <div class="card-body">
                        {{ $post->content }}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
