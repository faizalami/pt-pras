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
        </tr>
        </thead>
        <tbody>
        @if(count($data) != 0)
            @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->job->name }}</td>
                    <td>{{ $status[$item->status] }}</td>
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
