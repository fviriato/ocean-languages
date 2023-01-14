@extends('home')

@section('titulo', "{{ date('y/d/Y') }}")

@section('content_header')

@section('conteudo')

    <div class="row">
        <div class="col-md-12 container-fluid">
            <br>
            <br>
            <h3 class="text-center text-success font-weight-bold">{{ Auth::user()->name }}, Seja Bem Vindo(a)!</h3>
            <h1 class="text-center text-purple display-1 font-weight-bold">Ocean Languages</h1>
            <p class="text-center text-primary display-4 font-weight-bold">Sistema de Gestão</p>
            <br>
        </div>
    </div>

@endsection
