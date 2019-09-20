@extends('layout.main')

@section('title', 'Jobs Available')

@section('content')
    @if(Auth::user()->role == 1)
    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">Create New</a>
    <br>
    <br>
    @endif
    <table class="table datatable table-bordered table-hover">
        <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data) != 0)
            @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>
                        @if(Auth::user()->role == 1)
                        <form method="post" action="{{ route('admin.jobs.destroy', ['job' => $item->id]) }}">
                            @method('delete')
                            @csrf

                            <a class="btn btn-primary btn-xs"
                               href="{{ route('admin.applications.index', ['job' => $item->id]) }}">Applications</a>

                            <a class="btn btn-primary btn-xs"
                               href="{{ route('admin.jobs.edit', ['job' => $item->id]) }}">Edit</a>

                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>
                        @else
                            <a class="btn btn-primary btn-xs"
                               href="{{ route('applications.apply', ['job' => $item->id]) }}">Apply This Job</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="4">No Data!</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
