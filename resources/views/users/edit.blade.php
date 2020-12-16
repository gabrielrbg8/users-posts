@extends('layouts.app')

@section('title', 'Editar Usuário')

@section('content')

    <form method="put" action="{{ route('users.store') }}" class="w-25 container form-create-user d-flex flex-column justify-content-center">
        @csrf
        @if(Auth::user()->isAdmin())
        <div class="form-group d-flex flex-column justify-content-center">
            <label for="profile_id">Perfil</label>
            <select class="form-control" name="profile_id" id="">
                @if($user->profile_id == null)
                    @foreach($profiles as $profile)
                        <option value="{{$profile->id}}">{{$profile->name}}</option>
                    @endforeach
                @else
                    @foreach($profiles as $profile)
                        @if($profile->id == $user->profile_id)
                        <option selected value="{{$profile->id}}">{{$profile->name}}</option>
                        @else
                        <option value="{{$profile->id}}">{{$profile->name}}</option>
                        @endif
                   @endforeach
                @endif
            </select>
        </div>
        @endif

        <div class="form-group d-flex flex-column justify-content-center">
            <label for="name">Nome</label>
            <input value="{{ $user->name }}" class="form-control" name="name" type="text" placeholder="Nome">
        </div>

        <div class="form-group d-flex flex-column justify-content-center">
            <label for="name">Email</label>
            <input value="{{ $user->email }}" class="form-control" name="email" type="text" placeholder="E-mail">
        </div>

        <div class="form-group d-flex flex-column justify-content-center">
            <label for="name">Senha</label>
            <input type="password" class="form-control" name="password" type="text" placeholder="Senha">
        </div>

        <button class="btn btn-primary" type="submit" [disabled]="!form.form.valid">
            Salvar
        </button>
    </form>
<script>
    $(function() {
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
                url: "{{ route('users.update', $user->id) }}",
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
