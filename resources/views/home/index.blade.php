@extends('layout')


@include('layouts.partial.navbar')
@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Acceso con login.</p>
        <a class="btn btn-lg btn-primary" href="#" role="button">Ver más &raquo;</a>
        @endauth

        @guest
        <h1>¡Bienvenido!</h1>
        <p class="lead">Por favor registrese o ingrese con su correo.</p>
        @endguest
    </div>
@endsection