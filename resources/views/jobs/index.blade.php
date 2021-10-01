@extends('layout')

@section('title')
Home page
@endsection

@section('content')
    <div class="mt-4 d-flex flex-direction-column">
        <input type="text" class="form-control" placeholder="Search for a job now" name="search" id="search">
        <button class="btn btn-primary search-btn">Search</button>
    </div>

    <div class="searches">
        @foreach($searches as $s)
            {{ $s }}
        @endforeach
    </div>
@endsection
