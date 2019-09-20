@php($user = Auth::user())

@extends('layout.main')

@section('title', 'Profile')

@section('content')
    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
    <br>
    <br>
    @if($user->profile)
        <img width="200px" src="{{ asset('uploads/photo/'.$user->profile->photo) }}"
             alt="User Image">
    @else
        <img width="200px" src="{{ asset('images/default/user.png') }}"
             alt="User Image">
    @endif
    <br>
    <br>
    <table class="table table-bordered table-hover">
        <tbody>
        <tr>
            <th>Name</th>
            <td> :</td>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td> :</td>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td> :</td>
            <td>{{ $user->profile?$user->profile->phone:'' }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td> :</td>
            <td>{{ $user->profile?$user->profile->address:'' }}</td>
        </tr>
        <tr>
            <th>CV</th>
            <td> :</td>
            <td><a href="{{ asset('uploads/cv/'.($user->profile?$user->profile->cv:'')) }}">{{ $user->profile?$user->profile->cv:'' }}</a></td>
        </tr>
        <tr>
            <th>Expected Salary</th>
            <td> :</td>
            <td>{{ $user->profile?$user->profile->expected_salary:'' }}</td>
        </tr>
        </tbody>
    </table>
@endsection
