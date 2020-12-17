@component('mail::message')

<h2>Seja bem vindo, {{$userReceptor->name}}!</h2>
<h5>É um prazer têlo conosco.</h5>
<p>Segue a sua senha para login, lembre de não compartilhar ela com ninguém!</p>
<h5>{{$password}}</h5>

Obrigado, <br>
{{config('app.name')}}.
@endcomponent
