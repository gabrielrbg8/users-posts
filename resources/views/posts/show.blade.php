@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container">
    <div>
        <a href="{{ route('posts.index') }}">Home</a>
    </div>

    <div class="">
        <div class="container">
            <div class="d-flex">
                <h1 class="post-attribute-name">Título:</h1>
                <p class="post-attribute">{{ ucwords($post->title) }}</p>
            </div>
            <div class="d-flex">
                <h1 class="post-attribute-name">Subtítulo:</h1>
                <p class="post-attribute">{{ ucwords($post->subtitle) }}</p>
            </div>
            <div class="d-flex">
                <h1 class="post-attribute-name">Conteúdo:</h1>
                <p class="post-attribute">{{ ucwords($post->content) }}</p>
            </div>
            <div class="d-flex">
                <h1 class="post-attribute-name">Arquivos:</h1>
                <a id="btnDownload" class="post-attribute">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cloud-download-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.5a.5.5 0 0 1 1 0V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0zm-.354 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V11h-1v3.293l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('#btnDownload').on('click', function(e) {
            var url_string = window.location.href;
            var url = new URL(url_string);
            var postId = url.pathname.substr(7);
            window.location = url.origin + '/api/posts/download?id=' + postId;
        });
    });
</script>
@endsection