@php($user = Auth::user())

@extends('layout.main')

@section('title', 'Jobs Available - New Job')

@section('content')
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input name="upload-photo" type="file" id="photo">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name"
                           type="text"
                           class="form-control"
                           id="name"
                           placeholder="Enter Name"
                           value="{{ $user->name }}"
                    >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input name="email"
                           type="email"
                           class="form-control"
                           id="email"
                           placeholder="Enter Email"
                           value="{{ $user->email }}"
                    >
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input name="phone"
                           type="text"
                           class="form-control"
                           id="phone"
                           placeholder="Enter Phone"
                           value="{{ $user->profile?$user->profile->phone:'' }}"
                    >
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" id="address" class="form-control" placeholder="Enter Address"
                              cols="30" rows="10">{{ $user->profile?$user->profile->address:'' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="cv">CV</label>
                    <input name="upload-cv" type="file" id="cv">
                </div>
                <div class="form-group">
                    <label for="expected_salary">Expected Salary</label>
                    <input name="expected_salary"
                           type="number"
                           class="form-control"
                           id="expected_salary"
                           placeholder="Enter Expected Salary"
                           value="{{ $user->profile?$user->profile->expected_salary:'' }}"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
