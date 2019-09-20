<?php
$months = [
    1 => 'January',
    2 => 'February',
    3 => 'March',
    4 => 'April',
    5 => 'May',
    6 => 'June',
    7 => 'July',
    8 => 'August',
    9 => 'September',
    10 => 'October',
    11 => 'November',
    12 => 'December'
];
?>

@extends('layout.main')

@section('title', 'Certifications')

@section('content')
    <a href="{{ route('certifications.create') }}" class="btn btn-primary">Create New</a>
    <br>
    <br>
    <table class="table datatable table-bordered table-hover">
        <thead>
        <tr>
            <th>No.</th>
            <th>Certification</th>
            <th>Institution</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(count($data) != 0)
            @foreach($data as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->certification }}</td>
                    <td>{{ $item->institution }}</td>
                    <td>{{ $months[$item->month_obtained].' '.$item->year_obtained }}</td>
                    <td>
                        <form method="post" action="{{ route('certifications.destroy', ['certification' => $item->id]) }}">
                            @method('delete')
                            @csrf

                            <a class="btn btn-primary btn-xs"
                               href="{{ route('certifications.edit', ['certification' => $item->id]) }}">Edit</a>

                            <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                        </form>
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
