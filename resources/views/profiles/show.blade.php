@extends('layouts.app')

@section('title', $profile->name)

@section('content')
<div class="container">

    <div>
        <a class="btn btn-third" href="{{ route('profiles.index') }}">Perfis</a>
    </div>

    <table class="table text-center">
        <thead class="bg-third">
            <tr>
                <th class="profiles-table-head" scope='col'>#</th>
                <th class="profiles-table-head" scope='col'>Detalhes</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>ID</td>
                <td>{{$profile->id}}</td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>{{$profile->name}}</td>
            </tr>
            <tr>
                <td>Permissões</td>
                <td>
                    <a class="btn" id="btnModal">
                        <svg style="color:#007bff" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                            <circle cx="3.5" cy="5.5" r=".5" />
                            <circle cx="3.5" cy="8" r=".5" />
                            <circle cx="3.5" cy="10.5" r=".5" />
                        </svg>
                    </a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade" id="profileActionsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Permissões de {{ $profile->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table text-center">
                    <thead class="bg-third">
                        <tr>
                            <th class="profiles-table-head" scope='col'>Nome</th>
                            <th class="profiles-table-head" scope='col'>Descrição</th>
                            <th class="profiles-table-head" scope='col'>Ações</th>
                        </tr>
                    </thead>
                    @foreach($profileActions as $profileAction)
                    <tbody>
                        <tr>
                            <td>{{$profileAction->action->name}}</td>
                            <td>{{$profileAction->action->description}}</td>
                            <td>
                                <form action="{{ route('profile-actions.destroy' , $profileAction->id)}}" method="POST">
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
                    </tbody>
                    @endforeach
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Adicionar nova permissão</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(function() {

        $('#btnModal').click(function() {
            $('#profileActionsModal').addClass('fade').modal('show');
        });
    });
</script>
@endsection
