@extends('adminlte::page')

@section('title')

@section('content_header', 'Guarulhos - ' . strftime('%A, %d de %B de %Y', strtotime('today')))

@stop

@section('content')

    @yield('conteudo')

@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        // console.log('Hi!');
    </script>
@stop