@extends('layouts.app')

@section('title', 'Criar Post')

@section('content')
<div class="w-50 container d-flex justify-content-center flex-column">
    <div class="alert d-none alertBox" role="alert">
    </div>
    <form name="formPost" enctype="multipart/form-data" class="text-center">
        @csrf
        <div class="form-group d-flex flex-column justify-content-center">
            <label for="title">Titulo</label>
            <input class="form-control" type="text" name="title">
        </div>

        <div class="form-group d-flex flex-column justify-content-center">
            <label for="subtitle">Subtítulo</label>
            <input class="form-control" type="text" name="subtitle">
        </div>

        <div class="form-group d-flex flex-column justify-content-center">
            <label for="content">Conteúdo</label>
            <textarea class="form-control" cols="30" rows="10" name="content"></textarea>
        </div>

        <div class="form-group">
            <label for="files"></label>
            <input id="files" name="files[]" type="file" multiple>
        </div>

        <button class="btn btn-primary" type="submit" [disabled]="!form.form.valid">
            Salvar
        </button>
    </form>
</div>

<script>
    $(function() {
        $('form[name="formPost"]').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('posts.store') }}",
                type: "post",
                data: new FormData(this), // important
                processData: false, // important
                contentType: false, // important
                dataType: "json",
                success: function(res) {
                    if (res.status_code == 200) {
                        var url_string = window.location.href;
                        var url = new URL(url_string);
                        window.location = url.origin + '/posts'
                    } else {
                        $('.alertBox').removeClass('d-none alert-success').addClass('alert-danger').html(res.message)
                    }
                }
            });
        });
    });
    //  action="{{ route('posts.store') }}"
</script>



@endsection
