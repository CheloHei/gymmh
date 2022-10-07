@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Personas</h1>
@stop

@section('content')
    @livewire('component-peoples')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
@stop

@section('js')
<script src="{{ mix('js/app.js') }}" defer></script>
@livewireScripts
{{-- <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script> --}}
@stop