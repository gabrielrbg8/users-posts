@extends('layouts.app')

@section('title', 'Autenticar')

@section('content')
<html>
@if($errors->all())
@foreach($errors->all() as $error)
<div class="alert alert-danger" role="alert">
   {{ $error }}
</div>
@endforeach
@endif
<form method="POST" action="{{ route('admin.authenticate') }}" class="d-flex justify-content-center flex-column align-center">
    @csrf
    <label for="title">E-mail</label>
    <input type="text" name="email">

    <label for="title">Senha</label>
    <input type="password" name="password">

    <button type="submit" [disabled]="!form.form.valid">
        Login
    </button>
</form>

</html>
@endsection
