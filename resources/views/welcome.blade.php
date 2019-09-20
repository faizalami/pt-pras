@extends('layout.main')

@section('title', 'Welcome')

@section('content')

    <h1 class="text-center">Welcome</h1>
    <h2 class="text-center">{{ Auth::user()->name }}</h2>

@endsection
