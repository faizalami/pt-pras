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

@section('title', 'Certifications - New Certificate')

@section('content')
    <form method="post" action="{{ route('certifications.'.$action,
        $action=='update'? ['job' => $data->id] : []) }}">
        @if($action=='update')
            @method('put')
        @endif
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="certification">Certification</label>
                    <textarea name="certification" id="certification" class="form-control"
                              placeholder="Enter Description"
                              cols="30" rows="10">{{ $data->certification }}</textarea>
                </div>
                <div class="form-group">
                    <label for="institution">Institution</label>
                    <input name="institution"
                           type="text"
                           class="form-control"
                           id="institution"
                           placeholder="Enter Institution"
                           value="{{ $data->institution }}"
                    >
                </div>
                <div class="form-group">
                    <label>Month</label>
                    <select name="month_obtained" class="form-control">
                        @foreach($months as $key => $month)
                            <option value="{{ $key }}" @if($data->month_obtained == $key) selected @endif>{{ $month }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="year_obtained">Year</label>
                    <input name="year_obtained"
                           type="number"
                           class="form-control"
                           id="year_obtained"
                           placeholder="Enter Year"
                           value="{{ $data->year_obtained }}"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection
