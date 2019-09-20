<?php
$status = [
    'waiting',
    'accepted'
];
?>

@extends('layout.main')

@section('title', 'My Application')

@section('content')
    <table class="table datatable table-bordered table-hover">
        <thead>
        <tr>
            <th>No.</th>
            <th>Job</th>
            <th>Status</th>
            <th>Join Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data) != 0)
            @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->job->name }}</td>
                    <td>{{ $status[$item->status] }}</td>
                    <td>{{ $item->join_date }}</td>
                    <td>
                        @if($item->status == 0)
                        <a class="btn btn-primary btn-xs"
                               href="{{ route('admin.applications.accept', ['application' => $item->id]) }}">Accept</a>
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
