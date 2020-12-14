@extends('layouts.app')

@section('title', 'Criar nova ação')

@section('content')
<div class="w-50 container d-flex justify-content-center">
    <div class="alert d-none alertBox" role="alert">
    </div>
    <form name="formPost" enctype="multipart/form-data" class="text-center">
        @csrf
        <div class="form-group d-flex flex-column justify-content-center">
            <label for="title">Nome</label>
            <input class="form-control" type="text" name="name">
        </div>

        <div class="form-group d-flex flex-column justify-content-center">
            <label for="subtitle">Descrição</label>
            <input class="form-control" type="text" name="description">
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
                url: "{{ route('actions.store') }}",
                type: "post",
                data: new FormData(this), // important
                processData: false, // important
                contentType: false, // important
                dataType: "json",
                success: function(res) {
                    if (res.status_code == 200) {
                        var url_string = window.location.href;
                        var url = new URL(url_string);
                        window.location = url.origin + '/actions'
                    } else {
                        $('.alertBox').removeClass('d-none alert-success').addClass('alert-danger').html(res.message)
                    }
                }
            });
        });
    });
</script>



@endsection
