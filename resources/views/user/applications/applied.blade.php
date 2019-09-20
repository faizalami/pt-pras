@extends('layout.main')

@section('title', 'My Application')

@section('content')
    <h3 class="text-center">You Already Applied.</h3>
    <a href="{{ route('applications.index') }}" class="btn btn-primary">Back</a>
@endsection
