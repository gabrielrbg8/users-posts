@extends('layouts.app')

@section('title', 'Editar Perfil')

@section('content')
<div class="w-50 container d-flex justify-content-center flex-column">
    <div class="alert d-none alertBox" role="alert">
    </div>
    <form name="formPost" enctype="multipart/form-data" class="text-center">
        @csrf
        <div class="form-group d-flex flex-column justify-content-center">
            <label for="title">Nome</label>
            <input id="inputName" class="form-control" type="text" name="name" value="{{ $profile->name }}">
        </div>

        <label for="actions[]">Ações permitidas para este perfil</label>
        <select id="selectActions" class="js-example-basic-multiple form-control d-flex" name="actions[]" multiple="multiple">
            @foreach($actions as $action)
                @if(!empty($profileActions))
                    @foreach($profileActions as $profileAction)
                        @if($action->id == $profileAction->action_id)
                         <option selected value="{{ $action->id }}">{{ $action->description }}</option>
                        @endif
                    @endforeach
                @else
                <option value="{{ $action->id }}">{{ $action->description }}</option>
                @endif
            @endforeach
        </select>

        <button class="btn btn-primary" type="submit" [disabled]="!form.form.valid">
            Salvar
        </button>
    </form>
</div>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script>
    $(function() {

        $('.js-example-basic-multiple').select2();
        $('form[name="formPost"]').submit(function(e) {
            var name = $('#inputName').val()
            var actions = $('#selectActions').val()

            var data = {
                "name" : name,
                "actions" : actions,
            }
            console.log(actions);
            e.preventDefault();
            $.ajax({
                url: "{{ route('profiles.update', $profile->id) }}",
                type: "put",
                data: data,
                dataType: "json",
                headers:{
                    'X-CSRF-TOKEN' :  "{{ csrf_token() }}",
                },
                success: function(res) {
                    if (res.status_code == 200) {
                        var url_string = window.location.href;
                        var url = new URL(url_string);
                        window.location = url.origin + '/profiles'
                    } else {
                        console.log(res.profile);
                        $('.alertBox').removeClass('d-none alert-success').addClass('alert-danger').html(res.message)
                    }
                }
            });
        });
    });
</script>



@endsection
