@extends('layouts.app')

@section('content')
<div class="container">
    <div id="pai-container-cards" class="row justify-content-center ">
        <div id="container-cards" class="w-75 d-flex text-center">
            <div class="card d-flex flex-column" style="height:8rem; width: 18rem; margin:2%; border:1px solid #EE12B3">
                <div id="loaderPosts" class="container">
                    <div class="d-flex justify-content-center text-center">
                        <div style="border-bottom-color:#EE12B3; border-top-color:#EE12B3;border-left-color:#EE12B3;" class="loader4"></div>
                    </div>
                </div>
                <p id="countPosts" style="font-size:50px; color:#EE12B3; font-weight:bold"></p>
                <div class="w-100 align-self-end">
                    <a href="{{ route('posts.index') }}" class="w-100 btn btn-secondary" style="border-radius: 1px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">POSTS</a>
                </div>
            </div>

            <div class="card d-flex flex-column" style="height:8rem; width: 18rem; margin:2%; border:1px solid #007bff">
                <p id="countUsers" style="font-size:50px; color:#007bff; font-weight:bold"> </p>
                <div id="loaderUsers" class="container">
                    <div class="d-flex justify-content-center text-center">
                        <div style="border-bottom-color:#007bff; border-top-color:#007bff;border-left-color:#007bff;" class="loader4"></div>
                    </div>
                </div>
                <div class="w-100 align-self-end">
                    <a href="{{ route('users.index') }}" class="w-100 btn btn-primary" style="border-radius: 1px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">USUÁRIOS</a>
                </div>
            </div>

            <div class="card d-flex flex-column" style="height:8rem; width: 18rem; margin:2%; border:1px solid #F4E606">
                <div id="loaderFiles" class="container">
                    <div class="d-flex justify-content-center text-center">
                        <div style="border-bottom-color:#F4E606; border-top-color:#F4E606;border-left-color:#F4E606;" class="loader4"></div>
                    </div>
                </div>
                <p id="countFiles" style="font-size:50px; color:#F4E606; font-weight:bold"></p>
                <div class="w-100 align-self-end">
                    <a href="#" class="w-100 btn btn-third" style="color:white; border-radius: 1px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px;">ARQUIVOS</a>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {
        $.get("{{ route('users.total') }}", function(res) {
            $('#loaderUsers').addClass('d-none');
            $('#countUsers').html(res.total);
        });

        $.get("{{ route('posts.total') }}", function(res) {
            $('#loaderPosts').addClass('d-none');
            $('#countPosts').html(res.total);
        });

        $.get("{{ route('files.total') }}", function(res) {
            $('#loaderFiles').addClass('d-none');
            $('#countFiles').html(res.total);
        });
    });
</script>

<style>
    #pai-container-cards {
        height: 70vh;
        align-items: center;
    }

    .loader4 {
        width: 45px;
        height: 45px;
        display: inline-block;
        padding: 0px;
        border-radius: 100%;
        border: 5px solid;
        border-top-color: rgba(246, 36, 89, 1);
        border-bottom-color: rgba(255, 255, 255, 0.3);
        border-left-color: rgba(246, 36, 89, 1);
        border-right-color: rgba(255, 255, 255, 0.3);
        -webkit-animation: loader4 1s ease-in-out infinite;
        animation: loader4 1s ease-in-out infinite;
    }

    @keyframes loader4 {
        from {
            transform: rotate(0deg);
        }

        to {
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes loader4 {
        from {
            -webkit-transform: rotate(0deg);
        }

        to {
            -webkit-transform: rotate(360deg);
        }
    }

    @media(max-width:765px) {
        #container-cards {
            width: auto !important;
            flex-direction: column;
        }
        .card{
            margin: 2% 0 0 0 !important;
        }
    }
</style>
@endsection
