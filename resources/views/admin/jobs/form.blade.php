@extends('layout.main')

@section('title', 'Jobs Available - New Job')

@section('content')
    <form method="post" action="{{ route('admin.jobs.'.$action,
        $action=='update'? ['job' => $data->id] : []) }}">
        @if($action=='update')
            @method('put')
        @endif
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name"
                           type="text"
                           class="form-control"
                           id="name"
                           placeholder="Enter Name"
                           value="{{ $data->name }}"
                    >
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Enter Description"
                              cols="30" rows="10">{{ $data->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
